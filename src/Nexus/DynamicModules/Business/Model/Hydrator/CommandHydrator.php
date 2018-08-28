<?php


namespace Nexus\DynamicModules\Business\Model\Hydrator;


use Nexus\DynamicModules\Business\Model\Finder\ModuleFinderInterface;
use Xervice\Core\Business\Model\Locator\Locator;

class CommandHydrator implements CommandHydratorInterface
{
    /**
     * @var \Nexus\DynamicModules\Business\Model\Finder\ModuleFinderInterface
     */
    private $finder;

    /**
     * CommandHydrator constructor.
     *
     * @param \Nexus\DynamicModules\Business\Model\Finder\ModuleFinderInterface $finder
     */
    public function __construct(ModuleFinderInterface $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @param array $commands
     *
     * @return array
     */
    public function hydrateCommands(array $commands) : array
    {
        $modulesDone = [];

        foreach ($this->finder->getModuleList() as $module) {
            $moduleName = basename($module);

            if (!\in_array($moduleName, $modulesDone, true)) {
                $facade = Locator::getInstance()->{$moduleName}()->facade();
                if (method_exists($facade, 'getCommands')) {
                    $commands = \array_merge($commands, $facade->getCommands());
                }
                $modulesDone[] = $moduleName;
            }
        }

        return $commands;
    }
}