<?php

// Code uses https://github.com/magium/mcm-zend-db-factory

require_once '../vendor/autoload.php';

$factory = new \Magium\Configuration\MagiumConfigurationFactory();
$config = $factory->getManager()->getConfiguration();

$adapter = \Magium\ZendDbFactory\ZendDbFactory::factory($config);

$sql = new \Zend\Db\Sql\Sql($adapter);
$sql->select('test')->where('a = 1');
