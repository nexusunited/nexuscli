<?php

namespace Nexus\CustomCommand\Business\Finder;

interface CommandFinderInterface
{
    /**
     * @return bool
     */
    public function isDir() : bool;

    /**
     * @return \Symfony\Component\Finder\Finder
     */
    public function getCommandClasses();
}