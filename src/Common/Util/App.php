<?php
namespace Neoauto\Common\Util;


class App
{
    public function __construct()
    {
    }

    public static function baseUrl ()
    {
        $configuration = new \Neoauto\Common\Util\Configuration();
        $config = $configuration->getConfigBase();

        return  !empty($config['globals']['baseUrl'])? $config['globals']['baseUrl']: null;
    }

    public static function elementUrl ()
    {
        $configuration = new \Neoauto\Common\Util\Configuration();
        $config = $configuration->getConfigBase();

        return  !empty($config['globals']['elementUrl'])? $config['globals']['elementUrl']: null;
    }
}
