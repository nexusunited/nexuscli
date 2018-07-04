<?php


namespace Nexus\Shell\Business\Executor;


interface ExecutorInterface
{
    public function execute(string $command) : string;
}