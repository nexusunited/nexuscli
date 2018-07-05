<?php


namespace Nexus\CustomCommand;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Nexus\CustomCommand\CustomCommandFactory getFactory()
 * @method \Nexus\CustomCommand\CustomCommandConfig getConfig()
 * @method \Nexus\CustomCommand\CustomCommandClient getClient()
 */
class CustomCommandFacade extends AbstractFacade
{
    /**
     * @param array $commands
     * @param string $directory
     * @param bool $recursive
     *
     * @return array
     */
    public function hydrateCommands(array $commands, string $directory, bool $recursive)
    {
        return $this->getFactory()->createCommandHydrator($directory, $recursive)->hydrateCommands($commands);
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function runShell(string $command) : string
    {
        return $this->getFactory()->getShellFacade()->runCommand($command);
    }
}