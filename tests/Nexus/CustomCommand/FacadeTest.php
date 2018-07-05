<?php
namespace NexusTest\CustomCommand;

use Nexus\CustomCommand\Command\TestRecursiveCommand;
use Xervice\Core\Locator\Locator;
use XerviceTest\Console\Command\TestCommand;

class FacadeTest extends \Codeception\Test\Unit
{
    /**
     * @var \Nexus\CustomCommand\CustomCommandFacade
     */
    private $facade;

    protected function _before()
    {
        $this->facade = Locator::getInstance()->customCommand()->facade();
    }

    /**
     * @group Nexus
     * @group CustomCommand
     * @group Facade
     * @group Integration
     */
    public function testHydrateCommandsRecusive()
    {
        $commands = $this->facade->hydrateCommands([], __DIR__ . '/test', true);

        $this->assertCount(2, $commands);

        $this->assertInstanceOf(
            'Nexus\\CustomCommand\\Command\\TestCommand',
            $commands[0]
        );
        $this->assertInstanceOf(
            'Nexus\\CustomCommand\\Command\\TestRecursiveCommand',
            $commands[1]
        );
    }

    /**
     * @group Nexus
     * @group CustomCommand
     * @group Facade
     * @group Integration
     */
    public function testHydrateCommandsNotRecusive()
    {
        $commands = $this->facade->hydrateCommands([], __DIR__ . '/test', false);

        $this->assertCount(1, $commands);

        $this->assertInstanceOf(
            'Nexus\\CustomCommand\\Command\\TestCommand',
            $commands[0]
        );
    }

    /**
     * @group Nexus
     * @group CustomCommand
     * @group Facade
     * @group Integration
     */
    public function testHydrateCommandsWithNonExistingDirectory()
    {
        $commands = $this->facade->hydrateCommands([], __DIR__ . '/notExisting', false);

        $this->assertCount(0, $commands);
    }
}