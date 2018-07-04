<?php


namespace App\Shell\Business\Executor;


interface ExecutorInterface
{
    public function execute(string $command) : string;
}