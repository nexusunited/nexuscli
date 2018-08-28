<?php


namespace Nexus\DockerClient\Business;


use Nexus\DockerClient\Business\Model\Docker;
use Nexus\DockerClient\Business\Model\DockerCompose;
use Nexus\DockerClient\Business\Model\DockerComposeInterface;
use Nexus\DockerClient\Business\Model\DockerInterface;
use Nexus\DockerClient\DockerClientDependencyProvider;
use Nexus\Shell\Business\ShellFacade;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

/**
 * @method \Nexus\DockerClient\DockerClientConfig getConfig()
 */
class DockerClientBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Nexus\DockerClient\Business\Model\DockerCompose
     */
    public function createDockerCompose(): DockerComposeInterface
    {
        return new DockerCompose(
            $this->getShellFacade(),
            $this->getConfig()->getDockerComposeCommand()
        );
    }

    /**
     * @return \Nexus\DockerClient\Business\Model\Docker
     */
    public function createDocker(): DockerInterface
    {
        return new Docker(
            $this->getShellFacade(),
            $this->getConfig()->getDockerCommand()
        );
    }

    /**
     * @return array
     */
    public function getCommandList(): array
    {
        return $this->getDependency(DockerClientDependencyProvider::COMMAND_LIST);
    }

    /**
     * @return \Nexus\Shell\Business\ShellFacade
     */
    public function getShellFacade(): ShellFacade
    {
        return $this->getDependency(DockerClientDependencyProvider::SHELL_FACADE);
    }
}