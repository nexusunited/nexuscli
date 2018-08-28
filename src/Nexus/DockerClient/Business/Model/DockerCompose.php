<?php
declare(strict_types=1);

namespace Nexus\DockerClient\Business\Model;


use Nexus\Shell\Business\ShellFacade;

class DockerCompose implements DockerComposeInterface
{
    /**
     * @var \Nexus\Shell\Business\ShellFacade
     */
    private $shellFacade;

    /**
     * @var string
     */
    private $command;

    /**
     * DockerCompose constructor.
     *
     * @param \Nexus\Shell\Business\ShellFacade $shellFacade
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