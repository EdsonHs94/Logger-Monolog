<?php
namespace Neoauto\Common\Adapter;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AdapterMonoLog
{
    private $log;
    
    public function __construct()
    {
        $fileName = __DIR__. '/../../../logs/loggerfinal.log';
        try {
            $this->log = new Logger('NeoautoLogger');
            $this->log->pushHandler(new StreamHandler($fileName, Logger::WARNING));
        } catch(\Exception $e) {
            var_dump($e->getMessage()); exit;
        }
    }
    
    public function getClientLog()
    {
        return $this->log;
    }
}