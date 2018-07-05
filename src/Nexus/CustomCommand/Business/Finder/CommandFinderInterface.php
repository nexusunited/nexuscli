<?php

namespace Nexus\CustomCommand\Business\Finder;

interface CommandFinderInterface
{
    /**
     * @return \Symfony\Component\Finder\Finder
     */
    public function getCommandClasses();
}