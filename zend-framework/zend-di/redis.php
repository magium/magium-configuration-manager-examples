<?php

// Code uses https://github.com/magium/mcm-redis-factory

require_once '../../vendor/autoload.php';

$config = [
    'definition'  => [
        'class' => [
            Redis::class => [
                'instantiator' => [
                    \Magium\RedisFactory\Factory::class,
                    'factory'
                ]
            ],
            Magium\RedisFactory\Factory::class => [
                'methods'   => [
                    'factory'   => [
                        'config'    => [
                            'type'      => \Magium\Configuration\Config\ConfigurationRepository::class,
                            'required'  => true
                        ]
                    ]
                ]
            ]
        ]
    ]
];
$factory = new \Magium\Configuration\MagiumConfigurationFactory();
$di = new \Zend\Di\Di();
$configuration = new \Zend\Di\Config($config);
$configuration->configure($di);
$di->instanceManager()->addSharedInstance(
    $factory->getManager()->getConfiguration(),
    \Magium\Configuration\Config\ConfigurationRepository::class
);

$redis = $di->get(Redis::class);

if ($redis instanceof \Redis) {
    $var = $redis->keys('*');
    var_dump($var);
}
