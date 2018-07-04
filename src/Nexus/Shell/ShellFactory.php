<?php


namespace Nexus\Shell;


use Nexus\Shell\Business\Executor\Exec;
use Nexus\Shell\Business\Executor\ExecutorInterface;
use Nexus\Shell\Business\ShellProvider;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Nexus\Shell\ShellConfig getConfig()
 */
class ShellFactory extends AbstractFactory
{
    /**
     * @return \Nexus\Shell\Business\ShellProvider
     */
    public function createShellProvider()
    {
        return new ShellProvider(
            $this->createExecutor()
        );
    }

    /**
     * @return \Nexus\Shell\Business\Executor\ExecutorInterface
     */
    public function createExecutor() : ExecutorInterface
    {
        return new Exec();
    }
}