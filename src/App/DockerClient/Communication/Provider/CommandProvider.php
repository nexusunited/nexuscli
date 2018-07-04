<?php


namespace App\DockerClient\Communication\Provider;


use App\Console\Provider\CommandProviderInterface;
use App\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;

class CommandProvider implements CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function provideCommands(array $commands): array
    {
        $commands += [
            new DockerComposeUpCommand()
        ];

        return $commands;
    }
}