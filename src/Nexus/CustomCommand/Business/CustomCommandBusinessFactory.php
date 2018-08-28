<?php
declare(strict_types=1);

namespace Nexus\CustomCommand\Business;

use Nexus\CustomCommand\Business\Model\Finder\CommandFinder;
use Nexus\CustomCommand\Business\Model\Finder\CommandFinderInterface;
use Nexus\CustomCommand\Business\Model\Hydrator\CommandHydrator;
use Nexus\CustomCommand\Business\Model\Hydrator\CommandHydratorInterface;
use Nexus\Shell\Business\ShellFacade;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

/**
 * @method \Nexus\CustomCommand\CustomCommandConfig getConfig()
 */
class CustomCommandBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @param string $directory
     * @param bool $recursive
     *
     * @return \Nexus\CustomCommand\Business\Model\Hydrator\CommandHydratorInterface
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
     * @param string $directory
     * @param bool $recursive
     *
     * @return \Nexus\CustomCommand\Business\Model\Finder\CommandFinderInterface
     */
    public function createCommandFinder(string $directory, bool $recursive) : CommandFinderInterface
    {
        return new CommandFinder(
            $directory,
            $recursive
        );
    }

    /**
     * @return \Nexus\Shell\Business\ShellFacade
     */
    public function getShellFacade(): ShellFacade
    {
        return $this->getDependency(CustomCommandDependencyProvider::SHELL_FACADE);
    }
}