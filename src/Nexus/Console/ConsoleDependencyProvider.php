<?php


namespace Nexus\Console;



use Nexus\CustomCommand\Communication\Provider\CommandProvider as CustomCommandCommandProvider;
use Nexus\DockerClient\Communication\Provider\CommandProvider;
use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;

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
        $commands = [];

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
            new CommandProvider(),
            new CustomCommandCommandProvider()
        ];
    }
}