<?php
declare(strict_types=1);

namespace Nexus\Dumper\Business;


use DataProvider\DumperConfigDataProvider;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Nexus\Dumper\Business\DumperBusinessFactory getFactory()
 * @method \Nexus\Dumper\DumperConfig getConfig()
 */
class DumperFacade extends AbstractFacade implements DumperFacadeInterface
{
    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->getFactory()->getCommandList();
    }

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function dump(DumperConfigDataProvider $configDataProvider): string
    {
        return $this->getFactory()->createDumper($configDataProvider)->dump();
    }

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function restore(DumperConfigDataProvider $configDataProvider): string
    {
        return $this->getFactory()->createDumper($configDataProvider)->restore();
    }

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function clear(DumperConfigDataProvider $configDataProvider): string
    {
        return $this->getFactory()->createDumper($configDataProvider)->clear();
    }
}