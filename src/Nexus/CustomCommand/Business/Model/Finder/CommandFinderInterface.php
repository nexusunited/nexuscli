<?php

namespace Nexus\CustomCommand\Business\Model\Finder;

use Symfony\Component\Finder\Finder;

interface CommandFinderInterface
{
    /**
     * @return bool
     */
    public function isDir() : bool;

    /**
     * @return \Symfony\Component\Finder\Finder
     */
    public function getCommandClasses(): Finder;
}