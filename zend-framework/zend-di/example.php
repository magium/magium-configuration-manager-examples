<?php

require_once '../../vendor/autoload.php';

$config = [
    'definition'  => [
        'class' => [
            \Magium\Configuration\Config\Repository\ConfigInterface::class => [
                'instantiator'  => [
                    \Magium\Configuration\MagiumConfigurationFactory::class,
                    'configurationFactory'
                ]
            ],
        ]
    ]
];

$di = new \Zend\Di\Di();
$diConfig = new \Zend\Di\Config($config);
$diConfig->configure($di);
$valueObject = $di->get(\Magium\Configuration\Example\ValueObject::class);

echo $valueObject->getValue();

