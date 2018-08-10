<?php


namespace Nexus\Dumper;


use DataProvider\DumperConfigDataProvider;
use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Nexus\Dumper\DumperFactory getFactory()
 * @method \Nexus\Dumper\DumperConfig getConfig()
 * @method \Nexus\Dumper\DumperClient getClient()
 */
class DumperFacade extends AbstractFacade
{
    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->getFactory()->getCommandList();
    }

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function dump(DumperConfigDataProvider $configDataProvider)
    {
        return $this->getFactory()->createDumper($configDataProvider)->dump();
    }

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function restore(DumperConfigDataProvider $configDataProvider)
    {
        return $this->getFactory()->createDumper($configDataProvider)->restore();
    }

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function clear(DumperConfigDataProvider $configDataProvider)
    {
        return $this->getFactory()->createDumper($configDataProvider)->clear();
    }
}