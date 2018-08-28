<?php


namespace Nexus\CustomCommand;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;
use Xervice\Core\Business\Model\Dependency\Provider\DependencyProviderInterface;

class CustomCommandDependencyProvider extends AbstractDependencyProvider
{
    public const SHELL_FACADE = 'shell.facade';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->addShellFacade($container);

        return $container;
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addShellFacade(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::SHELL_FACADE] = function(DependencyContainerInterface $container) {
            return $container->getLocator()->shell()->facade();
        };

        return $container;
    }
}