<?php


namespace Nexus\DynamicModules\Communication\Provider;


use Nexus\Console\Provider\CommandProviderInterface;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use Nexus\DockerClient\Communication\Command\Exec\DockerExecCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeCreateCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeRemoveCommand;
use Xervice\Config\XerviceConfig;
use Xervice\Core\Config\ConfigInterface;
use Xervice\Core\Locator\AbstractWithLocator;

/**
 * @method \Nexus\DynamicModules\DynamicModulesFacade getFacade()
 */
class CommandProvider extends AbstractWithLocator implements CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function provideCommands(array $commands): array
    {
        return $this->getFacade()->hydrateCommands(
            $commands
        );
    }
}