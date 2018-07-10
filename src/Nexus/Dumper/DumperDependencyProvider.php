<?php


namespace Nexus\Dumper;


use Nexus\Dumper\Communication\Command\DumpLocalCommand;
use Nexus\Dumper\Communication\Command\DumpSshCommand;
use Nexus\Dumper\Communication\Command\RestoreLocalCommand;
use Nexus\Dumper\Communication\Command\RestoreSshCommand;
use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class DumperDependencyProvider extends AbstractProvider
{
    public const DOCKER_FACADE = 'docker.facade';
    public const SHELL_FACADE = 'shell.facade';
    public const COMMAND_LIST = 'command.list';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    public function handleDependencies(DependencyProviderInterface $container)
    {
        $this->addShellFacade($container);
        $this->addDockerFacade($container);

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
            new DumpLocalCommand(),
            new DumpSshCommand(),
            new RestoreLocalCommand(),
            new RestoreSshCommand()
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

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $container
     */
    private function addDockerFacade(DependencyProviderInterface $container): void
    {
        $container[self::DOCKER_FACADE] = function(DependencyProviderInterface $container) {
            return $container->getLocator()->dockerClient()->facade();
        };
    }
}