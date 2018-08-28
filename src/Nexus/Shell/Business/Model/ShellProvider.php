<?php


namespace Nexus\Shell\Business\Model;


use Nexus\Shell\Business\Model\Executor\ExecutorInterface;

class ShellProvider
{
    /**
     * @var \Nexus\Shell\Business\Model\Executor\ExecutorInterface
     */
    private $executor;

    /**
     * ShellProvider constructor.
     *
     * @param \Nexus\Shell\Business\Model\Executor\ExecutorInterface $executor
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