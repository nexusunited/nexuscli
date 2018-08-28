<?php


namespace Nexus\CustomCommand\Business\Model\Finder;


use Symfony\Component\Finder\Finder;

class CommandFinder extends Finder implements CommandFinderInterface
{
    /**
     * @var string
     */
    private $directory;

    /**
     * @var bool
     */
    private $recursive;

    /**
     * CommandFinder constructor.
     *
     * @param string $directory
     * @param bool $recursive
     */
    public function __construct(string $directory, bool $recursive)
    {
        parent::__construct();

        $this->directory = $directory;
        $this->recursive = $recursive;
    }

    /**
     * @return bool
     */
    public function isDir() : bool
    {
        return is_dir($this->directory);
    }

    /**
     * @return \Symfony\Component\Finder\Finder
     */
    public function getCommandClasses(): Finder
    {
        if (!$this->recursive) {
            $this->depth('== 0');
        }
        return $this->files()->sortByName()->name('*Command.php')->in($this->directory);
    }
}