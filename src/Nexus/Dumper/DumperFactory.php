<?php


namespace Nexus\Dumper;


use DataProvider\DumperConfigDataProvider;
use Nexus\Dumper\Business\Dumper;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\Dumper\DumperConfig getConfig()
 */
class DumperFactory extends AbstractFactory
{
    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return \Nexus\Dumper\Business\Dumper
     */
    public function createDumper(DumperConfigDataProvider $configDataProvider)
    {
        $configDataProvider->setSshHost($this->getConfig()->getSshHost());
        $configDataProvider->setSshUser($this->getConfig()->getSshUser());
        $configDataProvider->setProject($this->getConfig()->getProject());
        $configDataProvider->setImageName($this->getConfig()->getImageName());
        $configDataProvider->setDumpDirectory($this->getConfig()->getDumpDirectory());

        return new Dumper(
            $configDataProvider,
            $this->getDockerFacade()
        );
    }

    /**
     * @return array
     */
    public function getCommandList()
    {
        return $this->getDependency(DumperDependencyProvider::COMMAND_LIST);
    }

    /**
     * @return \Nexus\Shell\ShellFacade
     */
    public function getShellFacade()
    {
        return $this->getDependency(DumperDependencyProvider::SHELL_FACADE);
    }

    /**
     * @return \Nexus\DockerClient\DockerClientFacade
     */
    public function getDockerFacade()
    {
        return $this->getDependency(DumperDependencyProvider::DOCKER_FACADE);
    }
}