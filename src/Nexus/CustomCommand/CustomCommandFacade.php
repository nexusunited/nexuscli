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
     * @param string $command
     *
     * @return string
     */
    public function runShell(string $command) : string
    {
        return $this->getFactory()->getShellFacade()->runCommand($command);
    }
}