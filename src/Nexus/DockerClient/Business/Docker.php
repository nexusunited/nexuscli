<?php


namespace Nexus\DockerClient\Business;


use Nexus\Shell\ShellFacade;

class Docker
{
    /**
     * @var \Nexus\Shell\ShellFacade
     */
    private $shellFacade;

    /**
     * @var string
     */
    private $command = 'docker';

    /**
     * DockerCompose constructor.
     *
     * @param \Nexus\Shell\ShellFacade $shellFacade
     */
    public function __construct(ShellFacade $shellFacade)
    {
        $this->shellFacade = $shellFacade;
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