<?php


namespace Nexus\CustomCommand;


use Xervice\Config\XerviceConfig;
use Xervice\Core\Config\AbstractConfig;
use Xervice\Core\CoreConfig;

class CustomCommandConfig extends AbstractConfig
{
    public const COMMAND_PATH = 'command.path';

    /**
     * @return string
     */
    public function getCommandPath()
    {
        return $this->get(
            self::COMMAND_PATH,
            $this->get(XerviceConfig::APPLICATION_PATH) . '/commands'
        );
    }
}