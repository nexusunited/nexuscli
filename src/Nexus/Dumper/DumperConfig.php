<?php
declare(strict_types=1);

namespace Nexus\Dumper;

use Xervice\Core\Business\Model\Config\AbstractConfig;

class DumperConfig extends AbstractConfig
{
    public const SSH_HOST = 'ssh.host';
    public const SSH_USER = 'ssh.user';
    public const PROJECT_NAME = 'project.name';
    public const IMAGE_NAME = 'image.name';
    public const DUMP_DIRECTORY = 'dump.directory';

    /**
     * @return string
     */
    public function getSshHost(): string
    {
        return $this->get(self::SSH_HOST);
    }

    /**
     * @return string
     */
    public function getSshUser(): string
    {
        return $this->get(self::SSH_USER);
    }

    /**
     * @return string
     */
    public function getProject(): string
    {
        return $this->get(self::PROJECT_NAME);
    }

    /**
     * @return string
     */
    public function getImageName(): string
    {
        return $this->get(self::IMAGE_NAME);
    }

    /**
     * @return string
     */
    public function getDumpDirectory(): string
    {
        return $this->get(self::DUMP_DIRECTORY);
    }
}