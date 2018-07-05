<?php


namespace Nexus\CustomCommand;


use Xervice\Config\XerviceConfig;
use Xervice\Core\Config\AbstractConfig;
use Xervice\Core\CoreConfig;

class CustomCommandConfig extends AbstractConfig
{
    const COMMAND_PATH = 'command.path';

    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getCommandPath()
    {
        return $this->get(
            self::COMMAND_PATH,
            $this->get(XerviceConfig::APPLICATION_PATH) . '/commands'
        );
    }
}