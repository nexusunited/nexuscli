<?php


namespace Nexus\Shell\Business;


use Nexus\Shell\Business\Executor\ExecutorInterface;

class ShellProvider
{
    /**
     * @var \Nexus\Shell\Business\Executor\ExecutorInterface
     */
    private $executor;

    /**
     * ShellProvider constructor.
     *
     * @param \Nexus\Shell\Business\Executor\ExecutorInterface $executor
     */
    public function __construct(ExecutorInterface $executor)
    {
        $this->executor = $executor;
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command) : string
    {
        return $this->executor->execute($command);
    }


}