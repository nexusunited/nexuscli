<?php

namespace Nexus\DynamicModules\Business\Model\Finder;

use Symfony\Component\Finder\Finder;

interface ModuleFinderInterface
{
    /**
     * @return array
     */
    public function getModuleList();
}