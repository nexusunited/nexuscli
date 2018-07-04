<?php


namespace App\Console;



use App\DockerClient\Communication\Provider\CommandProvider;
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
     * @return \App\Console\Provider\CommandProviderInterface[]
     */
    private function getCommandProvider()
    {
        return [
            new CommandProvider()
        ];
    }
}