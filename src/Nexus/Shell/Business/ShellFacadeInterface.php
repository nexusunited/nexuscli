<?php
declare(strict_types=1);

namespace Nexus\Shell\Business;


/**
 * @method \Nexus\Shell\Business\ShellBusinessFactory getFactory()
 */
interface ShellFacadeInterface
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function runCommand(string $command): string;
}