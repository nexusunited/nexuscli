<?php
declare(strict_types=1);

namespace Nexus\DynamicModules;

use Xervice\Config\Business\XerviceConfig;
use Xervice\Core\Business\Model\Config\AbstractConfig;
use Xervice\Core\CoreConfig;

class DynamicModulesConfig extends AbstractConfig
{
    public const COMMAND_PROVIDER_FILTER = 'command.provider.filter';

    /**
     * @return string
     */
    public function getCommandProviderFilter(): string
    {
        return $this->get(self::COMMAND_PROVIDER_FILTER, '*CommandProvider.php');
    }

    /**
     * @return string
     */
    public function getApplicationPath(): string
    {
        return $this->get(XerviceConfig::APPLICATION_PATH);
    }

    /**
     * @return array
     */
    public function getNamespaces(): array
    {
        return array_merge(
            $this->get(CoreConfig::CORE_NAMESPACES),
            $this->get(CoreConfig::PROJECT_NAMESPACES)
        );
    }
}