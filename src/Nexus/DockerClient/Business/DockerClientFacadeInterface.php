<?php
declare(strict_types=1);

namespace Nexus\DockerClient\Business;


/**
 * @method \Nexus\DockerClient\Business\DockerClientBusinessFactory getFactory()
 * @method \Nexus\DockerClient\DockerClientConfig getConfig()
 */
interface DockerClientFacadeInterface
{
    /**
     * @return array
     */
    public function getCommands();

    /**
     * @param string $command
     *
     * @return string
     */
    public function runDockerCompose(string $command): string;

    /**
     * @param string $command
     *
     * @return string
     */
    public function runDocker(string $command): string;
}