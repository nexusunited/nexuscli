<?php


namespace Nexus\DockerClient;


use Nexus\DockerClient\Communication\Command\Compose\DockerComposePullCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use Nexus\DockerClient\Communication\Command\Container\StartContainerCommand;
use Nexus\DockerClient\Communication\Command\Container\StopContainerCommand;
use Nexus\DockerClient\Communication\Command\Copy\DockerCpCommand;
use Nexus\DockerClient\Communication\Command\Exec\DockerExecCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeCreateCommand;
use Nexus\DockerClient\Communication\Command\Volume\VolumeRemoveCommand;
use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class DockerClientDependencyProvider extends AbstractProvider
{
    public const SHELL_FACADE = 'shell.facade';

    public const COMMAND_LIST = 'command.list';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $this->addShellFacade($dependencyProvider);

        $dependencyProvider[self::COMMAND_LIST] = function(DependencyProviderInterface $dependencyProvider) {
            return $this->getCommandList();
        };
    }

    /**
     * @return array
     */
    protected function getCommandList()
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
            new DockerCpCommand()
        ];
    }

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    private function addShellFacade(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::SHELL_FACADE] = function(DependencyProviderInterface $dependencyProvider) {
            return $dependencyProvider->getLocator()->shell()->facade();
        };
    }
}