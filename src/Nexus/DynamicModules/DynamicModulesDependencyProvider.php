<?php


namespace Nexus\DynamicModules;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class DynamicModulesDependencyProvider extends AbstractProvider
{
    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        // TODO: Implement handleDependencies() method.
    }
}