<?php

namespace Nexus\DynamicModules\Business\Model\Hydrator;

interface CommandHydratorInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands): array;
}