<?php
declare(strict_types=1);

namespace Nexus\Dumper\Business\Model;

interface DumperInterface
{
    /**
     * @return string
     */
    public function clear();

    /**
     * @return string
     */
    public function dump();

    /**
     * @return string
     */
    public function restore();
}