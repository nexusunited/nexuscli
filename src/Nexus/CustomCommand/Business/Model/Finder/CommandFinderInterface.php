<?php

namespace Nexus\CustomCommand\Business\Model\Finder;

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