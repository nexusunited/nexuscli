<?php

use Nexus\Dumper\DumperConfig;
use Xervice\Core\CoreConfig;

$config[CoreConfig::PROJECT_LAYER_NAMESPACE] = 'Nexus';

$config[DumperConfig::SSH_HOST] = '5.9.82.139';
$config[DumperConfig::SSH_USER] = 'nxsdocker';
$config[DumperConfig::PROJECT_NAME] = 'myproject';
$config[DumperConfig::IMAGE_NAME] = 'nxs-docker-dumper';
