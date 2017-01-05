<?php

namespace Neoauto\Common\Util;

class Server
{

    public static function getConfigDir()
    {
        $ruta      = __DIR__ . "/../../../../../../application/configs";
        $rutaLocal = __DIR__ . "/../../Config";
        $ruta      = realpath($ruta);
        $rutaLocal = realpath($rutaLocal);

        if (is_dir($ruta) && $ruta !== false) {
            return $ruta;
        } elseif (is_dir($rutaLocal) && $rutaLocal !== false) {
            return $rutaLocal;
        }

        throw new \Exception('Ruta de configuracion invalida');
    }

    public static function getConfigEnviromentDir()
    {
        try {
            $configDir  = self::getConfigDir();
            $enviroment = self::getEnviroment();
            $result     = null;

            $envDir = array(
                'production'  => 'prod',
                'development' => 'dev',
                'local'       => 'local',
                'pre2f'       => 'pre2f'
            );

            if (empty($envDir[$enviroment])) {
                throw new \Exception('Configuration enviroment invalidate');
            }

            return $configDir. '/'.$envDir[$enviroment];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function getEnviroment ()
    {
        $enviroment = getenv('APPLICATION_ENV');

        if (empty($enviroment)) {
            throw new \Exception('Configuration enviroment null');
        }

        return $enviroment;
    }
}