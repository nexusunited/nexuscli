<?php


namespace Nexus\Dumper\Communication\Provider;


use Nexus\Console\Provider\CommandProviderInterface;

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
        ];

        return $commands;
    }
}