<?php


namespace App\DockerClient\Communication\Provider;


use App\Console\Provider\CommandProviderInterface;
use App\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use App\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use App\DockerClient\Communication\Command\Exec\DockerExecCommand;
use App\DockerClient\Communication\Command\Volume\VolumeCreateCommand;
use App\DockerClient\Communication\Command\Volume\VolumeRemoveCommand;

class CommandProvider implements CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function provideCommands(array $commands): array
    {
        $commands += [
            new DockerComposeUpCommand(),
            new DockerComposeRmCommand(),
            new VolumeCreateCommand(),
            new VolumeRemoveCommand(),
            new DockerExecCommand()
        ];

        return $commands;
    }
}