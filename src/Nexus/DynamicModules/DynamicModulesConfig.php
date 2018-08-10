<?php


namespace Nexus\DynamicModules;


use Xervice\Config\XerviceConfig;
use Xervice\Core\Config\AbstractConfig;
use Xervice\Core\CoreConfig;

class DynamicModulesConfig extends AbstractConfig
{
    public const COMMAND_PROVIDER_FILTER = 'command.provider.filter';

    /**
     * @return string
     */
    public function getCommandProviderFilter()
    {
        return $this->get(self::COMMAND_PROVIDER_FILTER, '*CommandProvider.php');
    }

    /**
     * @return string
     */
    public function getApplicationPath()
    {
        return $this->get(XerviceConfig::APPLICATION_PATH);
    }

    /**
     * @return array
     */
    public function getNamespaces() : array
    {
        return [
            $this->get(CoreConfig::PROJECT_LAYER_NAMESPACE)
        ] + $this->get(CoreConfig::ADDITIONAL_LAYER_NAMESPACES, []);
    }
}