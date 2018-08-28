<?php
declare(strict_types=1);

namespace Nexus\CustomCommand\Business;

use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Nexus\CustomCommand\Business\CustomCommandBusinessFactory getFactory()
 * @method \Nexus\CustomCommand\CustomCommandConfig getConfig()
 */
class CustomCommandFacade extends AbstractFacade implements CustomCommandFacadeInterface
{
    /**
     * @param array $commands
     * @param string $directory
     * @param bool $recursive
     *
     * @return array
     */
    public function hydrateCommands(array $commands, string $directory, bool $recursive): array
    {
        return $this->getFactory()->createCommandHydrator($directory, $recursive)->hydrateCommands($commands);
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function runShell(string $command) : string
    {
        return $this->getFactory()->getShellFacade()->runCommand($command);
    }

    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->hydrateCommands(
            [],
            $this->getConfig()->getCommandPath(),
            true
        );
    }
}