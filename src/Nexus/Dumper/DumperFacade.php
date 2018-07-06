<?php


namespace Nexus\Dumper;


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
     * @param string $volume
     * @param string $path
     * @param string $version
     *
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function dumpToLocal(string $volume, string $path, string $version, string $datapath)
    {
        return $this->getFactory()->createDumper($volume, $path, 'default', $version, $datapath)->dump();
    }

    /**
     * @param string $volume
     * @param string $path
     * @param string $version
     *
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function restoreToLocal(string $volume, string $path, string $version, string $datapath)
    {
        return $this->getFactory()->createDumper($volume, $path, 'default', $version, $datapath)->restore();
    }

    /**
     * @param string $volume
     * @param string $path
     * @param string $version
     *
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function dumpToSsh(string $volume, string $path, string $version, string $datapath)
    {
        return $this->getFactory()->createDumper($volume, $path, 'ssh', $version, $datapath)->dump();
    }

    /**
     * @param string $volume
     * @param string $path
     * @param string $version
     *
     * @return string
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    public function restoreToSsh(string $volume, string $path, string $version, string $datapath)
    {
        return $this->getFactory()->createDumper($volume, $path, 'ssh', $version, $datapath)->restore();
    }
}