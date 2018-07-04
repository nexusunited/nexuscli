NEXUS CLI
======================

Installation
------------

```
composer global require nexusnetsoftgmbh/nexuscli:dev-master
```


Configuration
--------------

To use it in your docker project, you must create a "config"-directory in your root path.
There you have to place a "config_default.php" file with that content:
```php
<?php

use Nexus\Dumper\DumperConfig;
use Xervice\Core\CoreConfig;

$config[CoreConfig::PROJECT_LAYER_NAMESPACE] = 'Nexus';

$config[DumperConfig::SSH_HOST] = '5.9.82.139';
$config[DumperConfig::SSH_USER] = 'nxsdocker';
$config[DumperConfig::PROJECT_NAME] = 'myproject';
$config[DumperConfig::IMAGE_NAME] = 'nxs-docker-dumper';
```


Custom commands
----------------
If you want to add your own commands, you can create a "commands"-directory in your root path.
There you can place your own commands. A command filename must have the suffix "Command.php" and your command class must have the same name like your filename.
Example custom command 'LsCommand.php':
```php
<?php

namespace Nexus\CustomCommand\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

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

Also you can define your own CommandProvider if you want to add a group of commands. For that your filename must have the suffix "Provider.php" and is saved in the same directory like your custom commands.
Example:
```php
<?php

namespace Nexus\CustomCommand\Provider;

use Nexus\Console\Provider\CommandProviderInterface;

class CustomProvider implements CommandProviderInterface
{
    /**
     * @param array $commands
     *
     * @return array
     */
    public function provideCommands(array $commands): array
    {
        $commands[] = new MyCustomCommandClass();

        return $commands;
    }
}
```