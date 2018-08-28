<?php


namespace Nexus\Shell\Business;
use Xervice\Core\Business\Model\Facade\AbstractFacade;


/**
 * @method \Nexus\Shell\Business\ShellBusinessFactory getFactory()
 */
class ShellFacade extends AbstractFacade implements ShellFacadeInterface
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