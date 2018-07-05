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
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function createDockerCompose()
    {
        return new DockerCompose(
            $this->getShellFacade(),
            $this->getConfig()->getDockerComposeCommand()
        );
    }

    /**
     * @return \Nexus\DockerClient\Business\Docker
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function createDocker()
    {
        return new Docker(
            $this->getShellFacade(),
            $this->getConfig()->getDockerCommand()
        );
    }

    /**
     * @return array
     */
    public function getCommandList()
    {
        return $this->getDependency(DockerClientDependencyProvider::COMMAND_LIST);
    }

    /**
     * @return \Nexus\Shell\ShellFacade
     */
    public function getShellFacade()
    {
        return $this->getDependency(DockerClientDependencyProvider::SHELL_FACADE);
    }
}