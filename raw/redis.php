<?php

// Code uses https://github.com/magium/mcm-redis-factory

require_once '../vendor/autoload.php';

$factory = new \Magium\Configuration\MagiumConfigurationFactory();
$config = $factory->getManager()->getConfiguration();

$redis = \Magium\RedisFactory\Factory::factory($config);

