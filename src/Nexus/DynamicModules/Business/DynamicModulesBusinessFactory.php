<?php
declare(strict_types=1);

namespace Nexus\DynamicModules\Business;

use Nexus\DynamicModules\Business\Model\Finder\ModuleFinder;
use Nexus\DynamicModules\Business\Model\Finder\ModuleFinderInterface;
use Nexus\DynamicModules\Business\Model\Hydrator\CommandHydrator;
use Nexus\DynamicModules\Business\Model\Hydrator\CommandHydratorInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

/**
 * @method \Nexus\DynamicModules\DynamicModulesConfig getConfig()
 */
class DynamicModulesBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Nexus\DynamicModules\Business\Model\Hydrator\CommandHydratorInterface
     */
    public function createHydrator(): CommandHydratorInterface
    {
        return new CommandHydrator(
            $this->createFinder()
        );
    }

    /**
     * @return \Nexus\DynamicModules\Business\Model\Finder\ModuleFinderInterface
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