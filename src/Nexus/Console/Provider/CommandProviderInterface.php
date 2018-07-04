<?php


namespace Nexus\Console\Provider;


interface CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function provideCommands(array $commands) : array;
}