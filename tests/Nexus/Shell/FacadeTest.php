<?php
namespace NexusTest\Shell;

use Xervice\Core\Business\Model\Locator\Locator;

class FacadeTest extends \Codeception\Test\Unit
{
    /**
     * @var \Nexus\Shell\Business\ShellFacade
     */
    private $facade;

    protected function _before()
    {
        $this->facade = Locator::getInstance()->shell()->facade();
    }

    /**
     * @group Nexus
     * @group Shell
     * @group Facade
     * @group Integration
     */
    public function testRunCommand()
    {
        $command = sprintf(
            'cat %s/testDir/findme',
            __DIR__
        );

        $this->assertEquals(
            'test',
            $this->facade->runCommand($command)
        );
    }
}