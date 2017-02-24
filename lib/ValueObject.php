<?php

namespace Magium\Configuration\Example;

use Magium\Configuration\Config\Config;
use Magium\Configuration\Config\ConfigurationRepository;

class ValueObject
{

    protected $config;

    public function __construct(ConfigurationRepository $config)
    {
        $this->config = $config;
    }

    public function getValue()
    {
        return $this->config->getValue('section/group/element');
    }
}
