<?php


namespace Nexus\Dumper;


use Nexus\Dumper\Business\Dumper;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\Dumper\DumperConfig getConfig()
 */
class DumperFactory extends AbstractFactory
{
    /**
     * @param string $volume
     * @param string $path
     * @param string $engine
     * @param string $version
     *
     * @return \Nexus\Dumper\Business\Dumper
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function createDumper(string $volume, string $path, string $engine, string $version)
    {
        return new Dumper(
            $volume,
            $path,
            $this->getConfig()->getSshHost(),
            $this->getConfig()->getSshUser(),
            $engine,
            $this->getConfig()->getProject(),
            $version,
            $this->getConfig()->getImageName(),
            $this->getDockerFacade()
        );
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