NEXUS Docker Client
======================

Installation
------------

```
composer global require nexusnetsoftgmbh/dockercli:dev-master
```


Configuration
--------------

To use it in your docker project, you must create a "config"-directory in your root path.
There you have to place a "config_default.php" file with that content:
```php
<?php

use Xervice\Core\CoreConfig;

$config[CoreConfig::PROJECT_LAYER_NAMESPACE] = 'Nexus';
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