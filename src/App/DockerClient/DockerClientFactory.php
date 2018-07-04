<?php


namespace App\DockerClient;


use App\DockerClient\Business\DockerCompose;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \App\DockerClient\DockerClientConfig getConfig()
 */
class DockerClientFactory extends AbstractFactory
{
    /**
     * @return \App\DockerClient\Business\DockerCompose
     */
    public function createDockerCompose()
    {
        return new DockerCompose(
            $this->getShellFacade()
        );
    }

    /**
     * @return \App\Shell\ShellFacade
     */
    public function getShellFacade()
    {
        return $this->getDependency(DockerClientDependencyProvider::SHELL_FACADE);
    }
}