<?php
declare(strict_types=1);

namespace Nexus\DockerClient\Business\Model;

interface DockerComposeInterface
{
    /**
     * @param string $command
     *
     * @return string
     */
    public function execute(string $command): string;
}