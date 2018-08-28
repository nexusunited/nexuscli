<?php
declare(strict_types=1);

namespace Nexus\CustomCommand;

use Xervice\Config\Business\XerviceConfig;
use Xervice\Core\Business\Model\Config\AbstractConfig;

class CustomCommandConfig extends AbstractConfig
{
    public const COMMAND_PATH = 'command.path';

    /**
     * @return string
     */
    public function getCommandPath(): string
    {
        return $this->get(
            self::COMMAND_PATH,
            $this->get(XerviceConfig::APPLICATION_PATH) . '/commands'
        );
    }
}