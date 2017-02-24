<?php

require_once '../vendor/autoload.php';

$factory = new \Magium\Configuration\MagiumConfigurationFactory();
$config = $factory->getManager()->getConfiguration();
$valueOjbect = new \Magium\Configuration\Example\ValueObject($config);
echo $valueOjbect->getValue();
