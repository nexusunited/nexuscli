<?php
declare(strict_types=1);

namespace Nexus\Dumper\Business;

use DataProvider\DumperConfigDataProvider;
use Nexus\DockerClient\Business\DockerClientFacadeInterface;
use Nexus\Dumper\Business\Model\Dumper;
use Nexus\Dumper\Business\Model\DumperInterface;
use Nexus\Dumper\DumperDependencyProvider;
use Nexus\Shell\Business\ShellFacadeInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

/**
 * @method \Nexus\Dumper\DumperConfig getConfig()
 */
class DumperBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return \Nexus\Dumper\Business\Model\Dumper
     */
    public function createDumper(DumperConfigDataProvider $configDataProvider): DumperInterface
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
     * @return \Nexus\Shell\Business\ShellFacadeInterface
     */
    public function getShellFacade(): ShellFacadeInterface
    {
        return $this->getDependency(DumperDependencyProvider::SHELL_FACADE);
    }

    /**
     * @return \Nexus\DockerClient\Business\DockerClientFacadeInterface
     */
    public function getDockerFacade(): DockerClientFacadeInterface
    {
        return $this->getDependency(DumperDependencyProvider::DOCKER_FACADE);
    }
}