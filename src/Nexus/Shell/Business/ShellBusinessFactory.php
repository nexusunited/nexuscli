<?php


namespace Nexus\Shell\Business;


use Nexus\Shell\Business\Model\Executor\Exec;
use Nexus\Shell\Business\Model\Executor\ExecutorInterface;
use Nexus\Shell\Business\Model\ShellProvider;
use Nexus\Shell\Business\Model\ShellProviderInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

class ShellBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Nexus\Shell\Business\Model\ShellProvider
     */
    public function createShellProvider(): ShellProviderInterface
    {
        return new ShellProvider(
            $this->createExecutor()
        );
    }

    /**
     * @return \Nexus\Shell\Business\Model\Executor\ExecutorInterface
     */
    public function createExecutor() : ExecutorInterface
    {
        return new Exec();
    }
}