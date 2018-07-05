<?php


namespace Nexus\CustomCommand\Business\Hydrator;


use Nexus\CustomCommand\Business\Finder\CommandFinderInterface;

class CommandHydrator implements CommandHydratorInterface
{
    /**
     * @var \Nexus\CustomCommand\Business\Finder\CommandFinderInterface
     */
    private $commandFinder;

    /**
     * CommandHydrator constructor.
     *
     * @param \Nexus\CustomCommand\Business\Finder\CommandFinderInterface $commandFinder
     */
    public function __construct(CommandFinderInterface $commandFinder)
    {
        $this->commandFinder = $commandFinder;
    }

    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands)
    {
        if ($this->commandFinder->isDir()) {
            $commands = array_merge($commands, $this->getCommandsFromFinder());
        }

        return $commands;
    }

    /**
     * @param array $commands
     *
     * @return array
     */
    private function getCommandsFromFinder(): array
    {
        $commands = [];
        foreach ($this->commandFinder->getCommandClasses() as $file) {
            require_once $file->getRealPath();

            $className = sprintf(
                'Nexus\\CustomCommand\\Command\\%s',
                $file->getBasename('.php')
            );
            $commands[] = new $className();
        }
        return $commands;
    }


}