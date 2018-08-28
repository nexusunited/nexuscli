<?php
declare(strict_types=1);

namespace Nexus\Dumper;

use Nexus\Dumper\Communication\Command\DumpLocalCommand;
use Nexus\Dumper\Communication\Command\DumpSshCommand;
use Nexus\Dumper\Communication\Command\RestoreLocalCommand;
use Nexus\Dumper\Communication\Command\RestoreSshCommand;
use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;

class DumperDependencyProvider extends AbstractDependencyProvider
{
    public const DOCKER_FACADE = 'docker.facade';
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
        $container = $this->addDockerFacade($container);
        $container = $this->addCommandList($container);

        return $container;
    }

    /**
     * @return array
     */
    protected function getCommandList(): array
    {
        return [
            new DumpLocalCommand(),
            new DumpSshCommand(),
            new RestoreLocalCommand(),
            new RestoreSshCommand()
        ];
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    private function addShellFacade(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::SHELL_FACADE] = function(DependencyContainerInterface $container) {
            return $container->getLocator()->shell()->facade();
        };

        return $container;
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    private function addDockerFacade(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::DOCKER_FACADE] = function(DependencyContainerInterface $container) {
            return $container->getLocator()->dockerClient()->facade();
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