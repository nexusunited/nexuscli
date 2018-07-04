<?php


namespace Nexus\CustomCommand;


use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\CustomCommand\CustomCommandConfig getConfig()
 */
class CustomCommandFactory extends AbstractFactory
{


    /**
     * @return \Nexus\Shell\ShellFacade
     */
    public function getShellFacade()
    {
        return $this->getDependency(CustomCommandDependencyProvider::SHELL_FACADE);
    }
}