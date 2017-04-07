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
                            'type'      => \Magium\Configuration\Config\Repository\ConfigInterface::class,
                            'required'  => true
                        ]
                    ]
                ]
            ],
            \Magium\Configuration\Config\Repository\ConfigInterface::class => [
                'instantiator'  => [
                    \Magium\Configuration\MagiumConfigurationFactory::class,
                    'configurationFactory'
                ]
            ]
        ]
    ]
];
$di = new \Zend\Di\Di();
$configuration = new \Zend\Di\Config($config);
$configuration->configure($di);

$redis = $di->get(Redis::class);

if ($redis instanceof \Redis) {
    $var = $redis->keys('*');
    var_dump($var);
}
