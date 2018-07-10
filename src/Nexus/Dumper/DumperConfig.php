<?php


namespace Nexus\Dumper;


use Xervice\Core\Config\AbstractConfig;

class DumperConfig extends AbstractConfig
{
    public const SSH_HOST = 'ssh.host';

    public const SSH_USER = 'ssh.user';

    public const PROJECT_NAME = 'project.name';

    public const IMAGE_NAME = 'image.name';

    public const DUMP_DIRECTORY = 'dump.directory';

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getSshHost()
    {
        return $this->get(self::SSH_HOST);
    }

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getSshUser()
    {
        return $this->get(self::SSH_USER);
    }

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getProject()
    {
        return $this->get(self::PROJECT_NAME);
    }

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getImageName()
    {
        return $this->get(self::IMAGE_NAME);
    }

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getDumpDirectory()
    {
        return $this->get(self::DUMP_DIRECTORY);
    }
}