<?php
declare(strict_types=1);

namespace Nexus\DockerClient;

use Nexus\DockerClient\Communication\Command\Build\DockerBuildCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposePullCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use Nexus\DockerClient\Communication\Command\Container\StartContainerCommand;
use Nexus\DockerClient\Communication\Command\Container\StopContainerCommand;
use Nexus\DockerClient\Communication\Command\Copy\DockerCpCommand;
use Nexus\DockerClient\Communication\Command\Exec\DockerExecCommand;
use Nexus\DockerClient\Communication\Command\Restart\DockerRestartCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeCreateCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeRemoveCommand;
use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;

class DockerClientDependencyProvider extends AbstractDependencyProvider
{
    public const SHELL_FACADE = 'shell.facade';
    public const COMMAND_LIST = 'command.list';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->addShellFacade($container);
        $container = $this->addCommandList($container);

        return $container;
    }

    /**
     * @return array
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    protected function getCommandList(): array
    {
        return [
            new DockerComposeUpCommand(),
            new DockerComposeRmCommand(),
            new DockerComposePullCommand(),
            new VolumeCreateCommand(),
            new VolumeRemoveCommand(),
            new DockerExecCommand(),
            new StartContainerCommand(),
            new StopContainerCommand(),
            new DockerCpCommand(),
            new DockerBuildCommand(),
            new DockerRestartCommand()
        ];
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    private function addShellFacade(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::SHELL_FACADE] = function (DependencyContainerInterface $container) {
            return $container->getLocator()->shell()->facade();
        };

        return $container;
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addCommandList(
        DependencyContainerInterface $container
    ): DependencyContainerInterface {
        $container[self::COMMAND_LIST] = function (DependencyContainerInterface $container) {
            return $this->getCommandList();
        };

        return $container;
    }
}