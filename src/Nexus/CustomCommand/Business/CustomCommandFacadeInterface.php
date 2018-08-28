<?php
declare(strict_types=1);

namespace Nexus\CustomCommand\Business;


/**
 * @method \Nexus\CustomCommand\CustomCommandBusinessFactory getFactory()
 * @method \Nexus\CustomCommand\CustomCommandConfig getConfig()
 */
interface CustomCommandFacadeInterface
{
    /**
     * @param array $commands
     * @param string $directory
     * @param bool $recursive
     *
     * @return array
     */
    public function hydrateCommands(array $commands, string $directory, bool $recursive);

    /**
     * @param string $command
     *
     * @return string
     */
    public function runShell(string $command): string;

    /**
     * @return array
     */
    public function getCommands();
}