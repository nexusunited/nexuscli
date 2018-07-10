<?php


namespace Nexus\Console;



use Nexus\DynamicModules\Communication\Provider\CommandProvider as DynamicModulesCommandProvider;
use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;
use Xervice\DataProvider\Console\GenerateCommand;
use Xervice\Development\Command\GenerateAutoCompleteCommand;

class ConsoleDependencyProvider extends XerviceConsoleDependencyProvider
{
    /**
     * @return array
     */
    protected function getCommandList() : array
    {
        return $this->getDockerClientCommands();
    }

    private function getDockerClientCommands()
    {
        $commands = [
            new GenerateCommand()
        ];

        $commands = $this->addDevelopmentCommands($commands);

        foreach ($this->getCommandProvider() as $provider) {
            $commands = $provider->provideCommands($commands);
        }

        return $commands;
    }

    /**
     * @return \Nexus\Console\Provider\CommandProviderInterface[]
     */
    private function getCommandProvider()
    {
        return [
            new DynamicModulesCommandProvider()
        ];
    }

    /**
     * @param $commands
     *
     * @return array
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    private function addDevelopmentCommands($commands): array
    {
        if (class_exists(GenerateAutoCompleteCommand::class)) {
            $commands[] = new GenerateAutoCompleteCommand();
        }
        return $commands;
}
}