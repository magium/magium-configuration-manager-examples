<?php

namespace Magium\Configuration\Example;

use Magium\Configuration\Config\Config;

class ValueObject
{

    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getValue()
    {
        return $this->config->getValue('section/group/element');
    }
}
