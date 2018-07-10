<?php


namespace Nexus\Console;



use Nexus\DynamicModules\Communication\Provider\CommandProvider as DynamicModulesCommandProvider;
use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;
use Xervice\DataProvider\Console\GenerateCommand;

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
}