<?php


namespace Nexus\DockerClient;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Nexus\DockerClient\DockerClientFactory getFactory()
 * @method \Nexus\DockerClient\DockerClientConfig getConfig()
 * @method \Nexus\DockerClient\DockerClientClient getClient()
 */
class DockerClientFacade extends AbstractFacade
{
    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->getFactory()->getCommandList();
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function runDockerCompose(string $command) : string
    {
        return $this->getFactory()->createDockerCompose()->execute($command);
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function runDocker(string $command) : string
    {
        return $this->getFactory()->createDocker()->execute($command);
    }
}