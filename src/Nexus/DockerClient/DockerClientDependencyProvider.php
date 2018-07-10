<?php


namespace Nexus\DockerClient;


use Nexus\DockerClient\Communication\Command\Compose\DockerComposeRmCommand;
use Nexus\DockerClient\Communication\Command\Compose\DockerComposeUpCommand;
use Nexus\DockerClient\Communication\Command\Container\StartContainerCommand;
use Nexus\DockerClient\Communication\Command\Container\StopContainerCommand;
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
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    public function handleDependencies(DependencyProviderInterface $container)
    {
        $this->addShellFacade($container);

        $container[self::COMMAND_LIST] = function(DependencyProviderInterface $container) {
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
            new VolumeCreateCommand(),
            new VolumeRemoveCommand(),
            new DockerExecCommand(),
            new StartContainerCommand(),
            new StopContainerCommand()
        ];
    }

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    private function addShellFacade(DependencyProviderInterface $container): void
    {
        $container[self::SHELL_FACADE] = function(DependencyProviderInterface $container) {
            return $container->getLocator()->shell()->facade();
        };
    }
}