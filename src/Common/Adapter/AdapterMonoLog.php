<?php
namespace Neoauto\Common\Adapter;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;
class AdapterMonoLog
{
    private $log;
    
    public function __construct()
    {
        $fileName = __DIR__. '/../../../logs/loggerfinal.log';
        $InfoPathRotating = __DIR__. '/../../../logs/rotatingLogInfo.log';
        $WarningPathRotating = __DIR__. '/../../../logs/rotatingLogWarning.log';
        $ErrorPathRotating = __DIR__. '/../../../logs/rotatingLogError2.log';



        try {
            $LogRotHandler = new RotatingFileHandler($ErrorPathRotating, 1 ,Logger::ERROR );

            $streamHandler = new StreamHandler($fileName, Logger::WARNING);

            //var_dump($rotHandler); exit;
            $this->log = new Logger('NeoautoLogger');
            //$this->log->pushHandler($InfoRotHandler);
            //$this->log->pushHandler($WarrningRotHandler);
            $this->log->pushHandler($LogRotHandler);

        } catch(\Exception $e) {
            var_dump($e->getMessage()); exit;
        }
    }
    
    public function getClientLog()
    {
        return $this->log;
    }
}