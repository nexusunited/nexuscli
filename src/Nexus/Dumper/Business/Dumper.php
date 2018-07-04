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
    private $imageName;

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
     * @param string $imageName
     * @param DockerClientFacade $dockerFacade
     */
    public function __construct(
        string $volume,
        string $path,
        string $sshHost,
        string $sshUser,
        string $engine,
        string $project,
        string $version,
        string $imageName,
        DockerClientFacade $dockerFacade
    ) {
        $this->volume = $volume;
        $this->path = $path;
        $this->sshHost = $sshHost;
        $this->sshUser = $sshUser;
        $this->engine = $engine;
        $this->project = $project;
        $this->version = $version;
        $this->imageName = $imageName;
        $this->dockerFacade = $dockerFacade;
    }

    /**
     * @return string
     */
    public function dump()
    {
        $command = sprintf(
            'run --rm -v %s:%s -e SSHHOST=%s -e SSHUSER=%s -e ENGINE=%s -e PROJECT=%s -e VERSION=%s %s dump',
            $this->volume,
            $this->path,
            $this->sshHost,
            $this->sshUser,
            $this->engine,
            $this->project,
            $this->version,
            $this->imageName
        );

        return $this->dockerFacade->runDocker($command);
    }


}