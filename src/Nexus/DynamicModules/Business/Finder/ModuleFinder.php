<?php


namespace Nexus\DynamicModules\Business\Finder;


use Symfony\Component\Finder\Finder;

class ModuleFinder implements ModuleFinderInterface
{
    /**
     * @var string
     */
    private $applicationPath;

    /**
     * @var string
     */
    private $providerNameFilter;

    /**
     * @var array
     */
    private $namespaces;

    /**
     * ModuleFinder constructor.
     *
     * @param string $applicationPath
     * @param string $providerNameFilter
     * @param array $namespaces
     */
    public function __construct(string $applicationPath, string $providerNameFilter, array $namespaces)
    {
        $this->applicationPath = $applicationPath;
        $this->providerNameFilter = $providerNameFilter;
        $this->namespaces = $namespaces;
    }


    /**
     * @return array
     */
    public function getModuleList()
    {
        $modules = [];

        foreach ($this->getSearchDirectories() as $dir) {
            $modules = array_merge($modules, glob($dir . '/*'));
        }

        return $modules;
    }

    /**
     * @return array
     */
    private function getSearchDirectories() : array
    {
        $directories = [];

        foreach ($this->namespaces as $namespace) {
            $directories[] = $this->applicationPath . '/src/' . $namespace;
            $directories[] = $this->applicationPath . '/vendor/*/*/src/' . $namespace;
        }

        return $directories;
    }
}