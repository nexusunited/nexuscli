<?php


namespace Nexus\DockerClient;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class DockerClientDependencyProvider extends AbstractProvider
{
    const SHELL_FACADE = 'shell.facade';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    public function handleDependencies(DependencyProviderInterface $container)
    {
        $this->addShellFacade($container);
    }

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    private function addShellFacade(DependencyProviderInterface $container): void
    {
        $container[self::SHELL_FACADE] = function(DependencyProviderInterface $container) {
            return $container->getLocator()->shell()->facade();
        };
    }
}