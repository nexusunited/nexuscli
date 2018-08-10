<?php


namespace Nexus\DynamicModules;


use Nexus\DynamicModules\Business\Finder\ModuleFinder;
use Nexus\DynamicModules\Business\Finder\CommandFinderInterface;
use Nexus\DynamicModules\Business\Finder\ModuleFinderInterface;
use Nexus\DynamicModules\Business\Hydrator\CommandHydrator;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\DynamicModules\DynamicModulesConfig getConfig()
 */
class DynamicModulesFactory extends AbstractFactory
{
    /**
     * @return \Nexus\DynamicModules\Business\Hydrator\CommandHydrator
     */
    public function createHydrator()
    {
        return new CommandHydrator(
            $this->createFinder()
        );
    }

    /**
     * @return \Nexus\DynamicModules\Business\Finder\ModuleFinder
     */
    public function createFinder() : ModuleFinderInterface
    {
        return new ModuleFinder(
            $this->getConfig()->getApplicationPath(),
            $this->getConfig()->getCommandProviderFilter(),
            $this->getConfig()->getNamespaces()
        );
    }
}