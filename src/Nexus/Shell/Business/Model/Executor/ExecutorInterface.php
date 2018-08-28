<?php


namespace Nexus\Shell\Business\Model\Executor;


interface ExecutorInterface
{
    public function execute(string $command) : string;
}