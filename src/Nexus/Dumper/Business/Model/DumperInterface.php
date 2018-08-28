<?php
declare(strict_types=1);

namespace Nexus\Dumper\Business\Model;

interface DumperInterface
{
    /**
     * @return string
     */
    public function clear(): string;

    /**
     * @return string
     */
    public function dump(): string;

    /**
     * @return string
     */
    public function restore(): string;
}