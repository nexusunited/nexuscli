<?php
declare(strict_types=1);

namespace Nexus\DockerClient\Business;
use Xervice\Core\Business\Model\Facade\AbstractFacade;


/**
 * @method \Nexus\DockerClient\Business\DockerClientBusinessFactory getFactory()
 * @method \Nexus\DockerClient\DockerClientConfig getConfig()
 */
class DockerClientFacade extends AbstractFacade implements DockerClientFacadeInterface
{
    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->getFactory()->getCommandList();
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function runDockerCompose(string $command) : string
    {
        return $this->getFactory()->createDockerCompose()->execute($command);
    }

    /**
     * @param string $command
     *
     * @return string
     */
    public function runDocker(string $command) : string
    {
        return $this->getFactory()->createDocker()->execute($command);
    }
}