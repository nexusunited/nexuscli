<?php


namespace Nexus\Dumper\Communication\Provider;


use Nexus\Console\Provider\CommandProviderInterface;
use Nexus\Dumper\Communication\Command\DumpLocalCommand;

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
        $commands = array_merge($commands, [
            new DumpLocalCommand()
        ]);

        return $commands;
    }
}