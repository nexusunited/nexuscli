<?php


namespace Nexus\Dumper\Business;


use Nexus\DockerClient\DockerClientFacade;

class Dumper
{
    /**
     * @var string
     */
    private $volume;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $sshHost;

    /**
     * @var string
     */
    private $sshUser;

    /**
     * @var string
     */
    private $engine;

    /**
     * @var string
     */
    private $project;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $datapath;

    /**
     * @var string
     */
    private $imageName;

    /**
     * @var string
     */
    private $dumpDirectory;

    /**
     * @var DockerClientFacade
     */
    private $dockerFacade;

    /**
     * Dumper constructor.
     *
     * @param string $volume
     * @param string $path
     * @param string $sshHost
     * @param string $sshUser
     * @param string $engine
     * @param string $project
     * @param string $version
     * @param string $datapath
     * @param string $imageName
     * @param string $dumpDirectory
     * @param \Nexus\DockerClient\DockerClientFacade $dockerFacade
     */
    public function __construct(
        string $volume,
        string $path,
        string $sshHost,
        string $sshUser,
        string $engine,
        string $project,
        string $version,
        string $datapath,
        string $imageName,
        string $dumpDirectory,
        DockerClientFacade $dockerFacade
    ) {
        $this->volume = $volume;
        $this->path = $path;
        $this->sshHost = $sshHost;
        $this->sshUser = $sshUser;
        $this->engine = $engine;
        $this->project = $project;
        $this->version = $version;
        $this->datapath = $datapath;
        $this->imageName = $imageName;
        $this->dumpDirectory = $dumpDirectory;
        $this->dockerFacade = $dockerFacade;
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
            $this->volume,
            $this->path,
            $this->dumpDirectory,
            $this->sshHost,
            $this->sshUser,
            $this->engine,
            $this->project,
            $this->version,
            $this->datapath,
            $this->imageName,
            $type
        );
        return $command;
    }


}