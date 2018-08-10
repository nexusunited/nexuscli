<?php


namespace Nexus\DynamicModules;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Nexus\DynamicModules\DynamicModulesFactory getFactory()
 * @method \Nexus\DynamicModules\DynamicModulesConfig getConfig()
 * @method \Nexus\DynamicModules\DynamicModulesClient getClient()
 */
class DynamicModulesFacade extends AbstractFacade
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands)
    {
        return $this->getFactory()->createHydrator()->hydrateCommands($commands);
    }
}