<?php

use Nexus\CustomCommand\CustomCommandConfig;
use Nexus\Dumper\DumperConfig;
use Xervice\Core\CoreConfig;

$config[CoreConfig::PROJECT_LAYER_NAMESPACE] = 'Nexus';

$config[DumperConfig::SSH_HOST] = '5.9.82.139';
$config[DumperConfig::SSH_USER] = 'nxsdocker';
$config[DumperConfig::PROJECT_NAME] = 'myproject';
$config[DumperConfig::IMAGE_NAME] = 'nxs-docker-dumper';
$config[DumperConfig::DUMP_DIRECTORY] = dirname(__DIR__) . '/dump';

$config[CustomCommandConfig::COMMAND_PATH] = dirname(__DIR__) . '/nxscli/commands';