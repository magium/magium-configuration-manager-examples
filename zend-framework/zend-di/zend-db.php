<?php

// Code uses https://github.com/magium/mcm-redis-factory

require_once '../../vendor/autoload.php';

$config = [
    'definition'  => [
        'class' => [
            \Zend\Db\Adapter\Adapter::class => [
                'instantiator' => [
                    \Magium\ZendDbFactory\ZendDbFactory::class,
                    'factory'
                ]
            ],
            Magium\ZendDbFactory\ZendDbFactory::class => [
                'methods'   => [
                    'factory'   => [
                        'config'    => [
                            'type'      => \Magium\Configuration\Config\Repository\ConfigInterface::class,
                            'required'  => true
                        ]
                    ]
                ]
            ]
        ]
    ]
];

$di = new \Zend\Di\Di();
$configuration = new \Zend\Di\Config($config);
$configuration->configure($di);
$adapter = $di->get(\Zend\Db\Adapter\Adapter::class);

if ($adapter instanceof \Zend\Db\Adapter\Adapter) {
    $sql = new \Zend\Db\Sql\Sql($adapter);
    $sql->select('test')->where('a = 1');

}
