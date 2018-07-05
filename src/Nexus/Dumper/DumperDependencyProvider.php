<?php


namespace Nexus\Dumper;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class DumperDependencyProvider extends AbstractProvider
{
    const DOCKER_FACADE = 'docker.facade';
    const SHELL_FACADE = 'shell.facade';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    public function handleDependencies(DependencyProviderInterface $container)
    {
        $this->addShellFacade($container);
        $this->addDockerFacade($container);
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

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    private function addDockerFacade(DependencyProviderInterface $container): void
    {
        $container[self::DOCKER_FACADE] = function(DependencyProviderInterface $container) {
            return $container->getLocator()->dockerClient()->facade();
        };
    }
}