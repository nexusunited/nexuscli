<?php


namespace App\Shell;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \App\Shell\ShellFactory getFactory()
 * @method \App\Shell\ShellConfig getConfig()
 * @method \App\Shell\ShellClient getClient()
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