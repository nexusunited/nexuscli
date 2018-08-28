<?php
declare(strict_types=1);

namespace Nexus\Dumper\Business;

use DataProvider\DumperConfigDataProvider;

/**
 * @method \Nexus\Dumper\Business\DumperBusinessFactory getFactory()
 * @method \Nexus\Dumper\DumperConfig getConfig()
 */
interface DumperFacadeInterface
{
    /**
     * @return array
     */
    public function getCommands(): array;

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function dump(DumperConfigDataProvider $configDataProvider): string;

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function restore(DumperConfigDataProvider $configDataProvider): string;

    /**
     * @param \DataProvider\DumperConfigDataProvider $configDataProvider
     *
     * @return string
     */
    public function clear(DumperConfigDataProvider $configDataProvider): string;
}