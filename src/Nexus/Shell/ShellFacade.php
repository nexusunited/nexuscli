<?php


namespace Nexus\Shell;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Nexus\Shell\ShellFactory getFactory()
 * @method \Nexus\Shell\ShellConfig getConfig()
 * @method \Nexus\Shell\ShellClient getClient()
 */
class ShellFacade extends AbstractFacade
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function runCommand(string $command) : string
    {
        return $this->getFactory()->createShellProvider()->execute($command);
    }
}