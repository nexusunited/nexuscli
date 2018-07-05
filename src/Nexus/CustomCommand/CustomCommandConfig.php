<?php


namespace Nexus\CustomCommand;


use Xervice\Config\XerviceConfig;
use Xervice\Core\Config\AbstractConfig;
use Xervice\Core\CoreConfig;

class CustomCommandConfig extends AbstractConfig
{
    /**
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function getApplicationPath()
    {
        return $this->get(XerviceConfig::APPLICATION_PATH);
    }
}