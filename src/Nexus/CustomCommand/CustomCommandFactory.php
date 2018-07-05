<?php


namespace Nexus\CustomCommand;


use Nexus\CustomCommand\Business\Finder\CommandFinder;
use Nexus\CustomCommand\Business\Finder\CommandFinderInterface;
use Nexus\CustomCommand\Business\Hydrator\CommandHydrator;
use Nexus\CustomCommand\Business\Hydrator\CommandHydratorInterface;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\CustomCommand\CustomCommandConfig getConfig()
 */
class CustomCommandFactory extends AbstractFactory
{
    /**
     * @return \Nexus\CustomCommand\Business\Hydrator\CommandHydrator
     */
    public function createCommandHydrator(string $directory, bool $recursive) : CommandHydratorInterface
    {
        return new CommandHydrator(
            $this->createCommandFinder(
                $directory,
                $recursive
            )
        );
    }

    /**
     * @return \Nexus\CustomCommand\Business\Finder\CommandFinder
     */
    public function createCommandFinder(string $directory, bool $recursive) : CommandFinderInterface
    {
        return new CommandFinder(
            $directory,
            $recursive
        );
    }

    /**
     * @return \Nexus\Shell\ShellFacade
     */
    public function getShellFacade()
    {
        return $this->getDependency(CustomCommandDependencyProvider::SHELL_FACADE);
    }
}