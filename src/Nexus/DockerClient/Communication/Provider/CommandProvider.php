<?php


namespace Nexus\DockerClient\Communication\Provider;


use Nexus\Console\Provider\CommandProviderInterface;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use Nexus\DockerClient\Communication\Command\Exec\DockerExecCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeCreateCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeRemoveCommand;

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