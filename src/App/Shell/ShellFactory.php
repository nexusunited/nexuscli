<?php


namespace App\Shell;


use App\Shell\Business\Executor\Exec;
use App\Shell\Business\Executor\ExecutorInterface;
use App\Shell\Business\ShellProvider;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \App\Shell\ShellConfig getConfig()
 */
class ShellFactory extends AbstractFactory
{
    /**
     * @return \App\Shell\Business\ShellProvider
     */
    public function createShellProvider()
    {
        return new ShellProvider(
            $this->createExecutor()
        );
    }

    /**
     * @return \App\Shell\Business\Executor\ExecutorInterface
     */
    public function createExecutor() : ExecutorInterface
    {
        return new Exec();
    }
}