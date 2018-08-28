<?php
declare(strict_types=1);

namespace Nexus\Shell\Business\Model;

interface ShellProviderInterface
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command): string;
}