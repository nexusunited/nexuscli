<?php


namespace Nexus\DynamicModules\Business;
use Xervice\Core\Business\Model\Facade\AbstractFacade;


/**
 * @method \Nexus\DynamicModules\Business\DynamicModulesBusinessFactory getFactory()
 * @method \Nexus\DynamicModules\DynamicModulesConfig getConfig()
 */
class DynamicModulesFacade extends AbstractFacade
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands): array
    {
        return $this->getFactory()->createHydrator()->hydrateCommands($commands);
    }
}