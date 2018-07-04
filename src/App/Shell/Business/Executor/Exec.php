<?php


namespace App\Shell\Business\Executor;


class Exec implements ExecutorInterface
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command): string
    {
        exec($command, $output);

        return implode(PHP_EOL, $output);
    }

}