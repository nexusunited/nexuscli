<?php


namespace App\DockerClient;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \App\DockerClient\DockerClientFactory getFactory()
 * @method \App\DockerClient\DockerClientConfig getConfig()
 * @method \App\DockerClient\DockerClientClient getClient()
 */
class DockerClientFacade extends AbstractFacade
{
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