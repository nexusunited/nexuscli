<?php

namespace Nexus\CustomCommand\Business\Model\Hydrator;

interface CommandHydratorInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands);
}