<?php


namespace Nexus\DockerClient\Business;


use Nexus\Shell\ShellFacade;

class DockerCompose
{
    /**
     * @var ShellFacade
     */
    private $shellFacade;

    /**
     * @var string
     */
    private $command;

    /**
     * DockerCompose constructor.
     *
     * @param ShellFacade $shellFacade
     * @param string $command
     */
    public function __construct(ShellFacade $shellFacade, string $command)
    {
        $this->shellFacade = $shellFacade;
        $this->command = $command;
    }


    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command) {
        return $this->shellFacade->runCommand($this->command . ' ' . $command);
    }
}