<?php


namespace Nexus\DynamicModules\Communication\Provider;


use Nexus\Console\Provider\CommandProviderInterface;
use Xervice\Core\Plugin\AbstractCommunicationPlugin;

/**
 * @method \Nexus\DynamicModules\DynamicModulesFacade getFacade()
 */
class CommandProvider extends AbstractCommunicationPlugin implements CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function provideCommands(array $commands): array
    {
        return $this->getFacade()->hydrateCommands(
            $commands
        );
    }
}