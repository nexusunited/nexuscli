<?php


namespace App\Shell\Business\Executor;


class ShellExec implements ExecutorInterface
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command): string
    {
        $result = shell_exec($command);
        if ($result === null) {
            $result = '';
        }
        return $result;
    }

}