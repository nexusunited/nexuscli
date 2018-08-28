<?php
declare(strict_types=1);

namespace Nexus\DockerClient\Business\Model;

interface DockerInterface
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command);
}