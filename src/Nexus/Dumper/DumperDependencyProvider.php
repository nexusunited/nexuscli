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
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $this->addShellFacade($dependencyProvider);
        $this->addDockerFacade($dependencyProvider);

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
            new DumpLocalCommand(),
            new DumpSshCommand(),
            new RestoreLocalCommand(),
            new RestoreSshCommand()
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

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    private function addDockerFacade(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::DOCKER_FACADE] = function(DependencyProviderInterface $dependencyProvider) {
            return $dependencyProvider->getLocator()->dockerClient()->facade();
        };
    }
}