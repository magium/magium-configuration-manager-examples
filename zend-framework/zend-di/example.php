<?php

require_once '../../vendor/autoload.php';

$factory = new \Magium\Configuration\MagiumConfigurationFactory();
$di = new \Zend\Di\Di();
$di->instanceManager()->addSharedInstance(
    $factory->getManager()->getConfiguration(),
    \Magium\Configuration\Config\ConfigurationRepository::class
);
$valueObject = $di->get(\Magium\Configuration\Example\ValueObject::class);

echo $valueObject->getValue();

