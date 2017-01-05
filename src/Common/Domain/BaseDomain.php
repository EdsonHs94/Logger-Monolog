<?php
namespace Neoauto\Common\Domain;
use Neoauto\Config\DependenceInjection;


class BaseDomain extends DependenceInjection
{
    protected $container;

    public function __construct()
    {
        parent::__construct();
    }
}
