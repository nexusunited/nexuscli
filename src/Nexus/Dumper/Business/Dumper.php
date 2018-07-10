<?php


namespace Nexus\Dumper\Business;


use DataProvider\DumperConfigDataProvider;
use Nexus\DockerClient\DockerClientFacade;

class Dumper
{
    /**
     * @var DumperConfigDataProvider
     */
    private $configDataProvider;

    /**
     * @var DockerClientFacade
     */
    private $dockerFacade;

    /**
     * Dumper constructor.
     *
     * @param DumperConfigDataProvider $configDataProvider
     * @param DockerClientFacade $dockerFacade
     */
    public function __construct(
        DumperConfigDataProvider $configDataProvider,
        DockerClientFacade $dockerFacade
    ) {
        $this->configDataProvider = $configDataProvider;
        $this->dockerFacade = $dockerFacade;
    }

    /**
     * @return string
     */
    public function clear()
    {
        $command = $this->getCommand('clear');

        return $this->dockerFacade->runDocker($command);
    }

    /**
     * @return string
     */
    public function dump()
    {
        $command = $this->getCommand('dump');

        return $this->dockerFacade->runDocker($command);
    }

    /**
     * @return string
     */
    public function restore()
    {
        $command = $this->getCommand('restore');

        return $this->dockerFacade->runDocker($command);
    }

    /**
     * @return string
     */
    private function getCommand(string $type): string
    {
        $command = sprintf(
            'run --rm -v %s:%s -v %s:/dump -e SSHHOST=%s -e SSHUSER=%s -e ENGINE=%s -e PROJECT=%s -e VERSION=%s -e DATAPATH=%s %s %s',
            $this->configDataProvider->getVolume(),
            $this->configDataProvider->getPath(),
            $this->configDataProvider->getDumpDirectory(),
            $this->configDataProvider->getSshHost(),
            $this->configDataProvider->getSshUser(),
            $this->configDataProvider->getEngine(),
            $this->configDataProvider->getProject(),
            $this->configDataProvider->getVersion(),
            $this->configDataProvider->getPath(),
            $this->configDataProvider->getImageName(),
            $type
        );
        return $command;
    }


}