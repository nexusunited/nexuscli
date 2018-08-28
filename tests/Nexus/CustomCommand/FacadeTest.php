<?php
declare(strict_types=1);

namespace NexusTest\CustomCommand;

use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;

/**
 * @method \Nexus\CustomCommand\Business\CustomCommandFacade getFacade()
 */
class FacadeTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

    /**
     * @group Nexus
     * @group CustomCommand
     * @group Facade
     * @group Integration
     */
    public function testHydrateCommandsRecusive()
    {
        $commands = $this->getFacade()->hydrateCommands([], __DIR__ . '/test', true);

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
        $commands = $this->getFacade()->hydrateCommands([], __DIR__ . '/test', false);

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
        $commands = $this->getFacade()->hydrateCommands([], __DIR__ . '/notExisting', false);

        $this->assertCount(0, $commands);
    }
}