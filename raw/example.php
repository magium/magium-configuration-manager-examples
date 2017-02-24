<?php

require_once '../vendor/autoload.php';

$factory = new \Magium\Configuration\MagiumConfigurationFactory();
$config = $factory->getManager()->getConfiguration(getenv('ENVIRONMENT'));
$valueOjbect = new \Magium\Configuration\Example\ValueObject($config);
echo $valueOjbect->getValue();
