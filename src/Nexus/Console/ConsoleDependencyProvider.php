<?php
declare(strict_types=1);

namespace Nexus\Console;

use Nexus\DynamicModules\Communication\Provider\CommandProvider as DynamicModulesCommandProvider;
use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;
use Xervice\DataProvider\Communication\Console\GenerateCommand;
use Xervice\Development\Communication\Console\Command\GenerateAutoCompleteCommand;

class ConsoleDependencyProvider extends XerviceConsoleDependencyProvider
{
    /**
     * @return array
     */
    protected function getCommandList(): array
    {
        return $this->getDockerClientCommands();
    }

    /**
     * @return array
     */
    private function getDockerClientCommands()
    {
        $commands = [
            new GenerateCommand()
        ];

        $commands = $this->addDevelopmentCommands($commands);

        foreach ($this->getCommandProvider() as $provider) {
            $commands = $provider->provideCommands($commands);
        }

        return $commands;
    }

    /**
     * @return \Nexus\Console\Provider\CommandProviderInterface[]
     */
    private function getCommandProvider()
    {
        return [
            new DynamicModulesCommandProvider()
        ];
    }

    /**
     * @param array $commands
     *
     * @return array
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    private function addDevelopmentCommands(array $commands): array
    {
        if (class_exists(GenerateAutoCompleteCommand::class)) {
            $commands[] = new GenerateAutoCompleteCommand();
        }
        return $commands;
    }
}