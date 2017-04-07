<?php

namespace Magium\Configuration\Example;

use Magium\Configuration\Config\Repository\ConfigInterface;

class ValueObject
{

    protected $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function getValue()
    {
        return $this->config->getValue('section/group/element');
    }
}
