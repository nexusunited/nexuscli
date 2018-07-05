<?php


namespace Nexus\CustomCommand\Business\Hydrator;


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
    public function __construct(\Nexus\CustomCommand\Business\Finder\CommandFinderInterface $commandFinder)
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