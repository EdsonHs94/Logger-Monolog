<?php
namespace Neoauto\Common\Util;
require_once __DIR__.'/../../Lib/Spyc.php';

class Configuration
{
    private static $_yamlReader = null;
    private static $_iniReader = null;

    private static $_configPrivate = [];

    public function __construct()
    {
    }

    private static function _getYamlReader()
    {
        if (empty(self::$_yamlReader)) {
            self::$_yamlReader = new \Zend\Config\Reader\Yaml(array('Spyc','YAMLLoadString'));
        }

        return self::$_yamlReader;
    }

    private static function _getIniReader()
    {
        if (empty(self::$_iniReader)) {
            self::$_iniReader = new \Zend\Config\Reader\Ini();
        }

        return self::$_iniReader;
    }

    private static function _getConfigPrivate()
    {
        if (empty(self::$_configPrivate)) {
            $privateYamlFilepath = Server::getConfigDir() . '/private.config.yaml';
            if (file_exists($privateYamlFilepath) && is_readable($privateYamlFilepath)) {
                self::$_configPrivate = self::_getYamlReader()->fromFile($privateYamlFilepath);
            }

            $privateYamlFilepath2 = Server::getConfigDir() . '/private.config.yaml';
            if (file_exists($privateYamlFilepath2) && is_readable($privateYamlFilepath2)) {
                self::$_configPrivate = self::_getYamlReader()->fromFile($privateYamlFilepath2);
            }
        }

        return self::$_configPrivate;
    }

    private static function _getConfigPrivateByKey($key=null)
    {
        if (empty($key)) {
            return [];
        }

        $configPrivate = self::_getConfigPrivate();
        if (empty($configPrivate)) {
            return [];
        }

        return !empty($configPrivate[$key]) ? $configPrivate[$key] : [];
    }

    private static function _mergePrivateConfigByKey($config, $key=null)
    {
        $privateConfigKey = self::_getConfigPrivateByKey($key);
        if (!empty($privateConfigKey)) {
            $config = array_replace_recursive($config, $privateConfigKey);
        }

        return $config;
    }

    public static function getAllConfig()
    {
        try {
            $mail         = self::_getYamlReader()->fromFile(App_Server::getConfigEnviromentDir().'/mail.config.yaml');
            $service      = self::_getYamlReader()->fromFile(App_Server::getConfigEnviromentDir().'/service.config.yaml');
            $log  = self::_getIniReader()->fromFile(App_Server::getConfigEnviromentDir().'/log.config.ini');

            return array_merge_recursive($mail, $service, $log);

        } catch (\Exception $e) {
            throw $e;
        }
    }


    public static function getConfigService()
    {
        try {
            $result = self::_getYamlReader()->fromFile(Server::getConfigEnviromentDir().'/service.config.yaml');
            return self::_mergePrivateConfigByKey($result, 'service');
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public static function getConfigMail()
    {
        try {
            $result = self::_getYamlReader()->fromFile(Server::getConfigEnviromentDir().'/mail.config.yaml');
            return self::_mergePrivateConfigByKey($result, 'mail');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function getConfigLog()
    {
        try {
            $result = self::_getYamlReader()->fromFile(Server::getConfigEnviromentDir().'/log.config.yaml');
            return self::_mergePrivateConfigByKey($result, 'log');
        } catch (\Exception $e) {
            throw $e;
        }
    }



}
