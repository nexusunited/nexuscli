NEXUS CLI
================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nexusnetsoftgmbh/nexuscli/badges/quality-score.png)](https://scrutinizer-ci.com/g/nexusnetsoftgmbh/nexuscli)

Installation
------------

```
composer global require nexusnetsoftgmbh/nexuscli
```

Configuration
--------------

To use it in your docker project, you must create a "config"-directory in your root path.
There you have to place a "config_default.php" file with that content:
```php
<?php

use Nexus\CustomCommand\CustomCommandConfig;
use Nexus\Dumper\DumperConfig;
use Xervice\Core\CoreConfig;
use Xervice\DataProvider\DataProviderConfig;

$config[CoreConfig::PROJECT_NAMESPACES] = [
    'Nexus',
    'Project'
];

$config[DataProviderConfig::DATA_PROVIDER_GENERATED_PATH] = dirname(__DIR__) . '/_Generated';
$config[DataProviderConfig::DATA_PROVIDER_PATHS] = [
    dirname(__DIR__) . '/src/Nexus/*/Schema/',
    dirname(__DIR__) . '/vendor/xervice/*/src/Xervice/*/Schema/',
    dirname(__DIR__) . '/vendor/nexusnetsoftgmbh/*/src/*/*/Schema/'
];

$config[DumperConfig::SSH_HOST] = '5.9.82.139';
$config[DumperConfig::SSH_USER] = 'nxsdocker';
$config[DumperConfig::PROJECT_NAME] = 'myproject';
$config[DumperConfig::IMAGE_NAME] = 'nxs-docker-dumper';
$config[DumperConfig::DUMP_DIRECTORY] = dirname(__DIR__) . '/dump';

$config[CustomCommandConfig::COMMAND_PATH] = dirname(__DIR__) . '/nxscli/commands';
```

DataProvider (DTO)
----------------

NEXUS CLI use dataprovider classes to transfer informations. For that you must create a directory "_Generated" in your project directory next to the composer.json file.
If you want to use another directory, you have to change the directory path in your config_default.php and in the autoloading config in your composer.json file.

Before using the NEXUS CLI you must generate the dataprovider. For that you can use a command:
```
vendor/bin/nxscli dataprovider:generate
```

Usage
--------
You have to run the nxscli command in your project root directory. That's the same directory where you have created the "config" directory.
```
nxscli <command>
```

Extending
----------------
You can create your own nxscli. For that you have to create an "composer.json" file in your project root.
```json
{
  "require-dev": {
    "codeception/codeception": "*",
    "symfony/var-dumper": "*"
  },
  "require": {
    "php": ">=7.1.0",
    "nexusnetsoftgmbh/nexuscli": "dev-master"
  },
  "autoload": {
    "psr-4": {
      "NexusTest\\": "tests/Nexus/",
      "DataProvider\\": "_Generated/"
    },
    "psr-0": {
      "Nexus\\": "src/"
    }
  }
}
```

After that you can create an src directory and develop own Nexus-Modules in there.
Also you can extend you command from composer. For that you can require additional command-sets for nexuscli.




Custom commands
----------------
If you want to add your own commands, you can configure a directory where to search for custom commands.
A command filename must have the suffix "Command.php" and your command class must have the same name like your filename.
Also you can create subdirectories for your commands to group them. The namespace always have to be "Nexus\CustomCommand\Command".

Example custom command 'LsCommand.php':
```php
<?php

namespace Nexus\CustomCommand\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Business\Model\Command\AbstractCommand;

class LsCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('custom:ls')
             ->setDescription('List all files')
             ->addArgument('path', InputArgument::OPTIONAL, "Path for listing files", './');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = sprintf(
            'ls %s',
            $input->getArgument('path')
        );

        $output->writeln(
            $this->getFacade()->runShell($command)
        );
    }

}
```