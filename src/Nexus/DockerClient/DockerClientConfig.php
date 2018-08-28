<?php
declare(strict_types=1);

namespace Nexus\DockerClient;

use Xervice\Core\Business\Model\Config\AbstractConfig;

class DockerClientConfig extends AbstractConfig
{
    public const DOCKER_COMMAND = 'docker.command';

    public const DOCKER_COMPOSE_COMMAND = 'docker.compose.command';

    /**
     * @return string
     */
    public function getDockerCommand()
    {
        return $this->get(self::DOCKER_COMMAND, 'docker');
    }

    /**
     * @return string
     */
    public function getDockerComposeCommand()
    {
        return $this->get(self::DOCKER_COMPOSE_COMMAND, 'docker-compose');
    }
}