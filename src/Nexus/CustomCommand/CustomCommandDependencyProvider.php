<?php


namespace Nexus\CustomCommand;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class CustomCommandDependencyProvider extends AbstractProvider
{
    public const SHELL_FACADE = 'shell.facade';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProviuder
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProviuder): void
    {
        $this->addShellFacade($dependencyProviuder);
    }

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProviuder
     */
    private function addShellFacade(DependencyProviderInterface $dependencyProviuder): void
    {
        $dependencyProviuder[self::SHELL_FACADE] = function(DependencyProviderInterface $dependencyProviuder) {
            return $dependencyProviuder->getLocator()->shell()->facade();
        };
    }
}