<?php


namespace Nexus\DockerClient;


use Nexus\DockerClient\Business\Docker;
use Nexus\DockerClient\Business\DockerCompose;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\DockerClient\DockerClientConfig getConfig()
 */
class DockerClientFactory extends AbstractFactory
{
    /**
     * @return \Nexus\DockerClient\Business\DockerCompose
     */
    public function createDockerCompose()
    {
        return new DockerCompose(
            $this->getShellFacade()
        );
    }

    /**
     * @return \Nexus\DockerClient\Business\Docker
     */
    public function createDocker()
    {
        return new Docker(
            $this->getShellFacade()
        );
    }

    /**
     * @return \Nexus\Shell\ShellFacade
     */
    public function getShellFacade()
    {
        return $this->getDependency(DockerClientDependencyProvider::SHELL_FACADE);
    }
}