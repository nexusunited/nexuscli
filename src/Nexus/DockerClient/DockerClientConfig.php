<?php


namespace Nexus\DockerClient;


use Xervice\Core\Config\AbstractConfig;

class DockerClientConfig extends AbstractConfig
{
    public const DOCKER_COMMAND = 'docker.command';

    public const DOCKER_COMPOSE_COMMAND = 'docker.compose.command';

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getDockerCommand()
    {
        return $this->get(self::DOCKER_COMMAND, 'docker');
    }

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getDockerComposeCommand()
    {
        return $this->get(self::DOCKER_COMPOSE_COMMAND, 'docker-compose');
    }
}