<?php

namespace Nexus\CustomCommand\Business\Hydrator;

interface CommandHydratorInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands);
}