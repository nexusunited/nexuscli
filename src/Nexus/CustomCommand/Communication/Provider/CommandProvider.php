<?php


namespace Nexus\CustomCommand\Communication\Provider;


use Nexus\Console\Provider\CommandProviderInterface;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use Nexus\DockerClient\Communication\Command\Exec\DockerExecCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeCreateCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeRemoveCommand;
use Xervice\Config\XerviceConfig;
use Xervice\Core\Config\ConfigInterface;
use Xervice\Core\Locator\AbstractWithLocator;

class CommandProvider extends AbstractWithLocator implements CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function provideCommands(array $commands): array
    {
        $commandPath = $this->getFacade()->getConfig()->get(XerviceConfig::APPLICATION_PATH) . '/commands';

        if (is_dir($commandPath)) {
            $commands = $this->addCustomCommands($commands, $commandPath);
            $commands = $this->addCustomProvider($commands, $commandPath);
        }

        return $commands;
    }

    /**
     * @param array $commands
     * @param $commandPath
     *
     * @return array
     */
    private function addCustomCommands(array $commands, $commandPath): array
    {
        foreach (glob($commandPath . '/*Command.php') as $file) {
            require $file;

            $className = 'Nexus\\CustomCommand\\Command\\' . basename($file, '.php');
            $commands[] = new $className();
        }
        return $commands;
}

    /**
     * @param array $commands
     * @param $commandPath
     *
     * @return array
     */
    private function addCustomProvider(array $commands, $commandPath): array
    {
        foreach (glob($commandPath . '/*Provider.php') as $file) {
            require $file;

            $className = 'Nexus\\CustomCommand\\Provider\\' . basename($file, '.php');
            $provider = new $className();
            if ($provider instanceof CommandProviderInterface) {
                $commands = $provider->provideCommands($commands);
            }
        }
        return $commands;
}
}