<?php

require_once '../vendor/autoload.php';

use Neoauto\Domain\Service\LoggerService;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Neoauto\Domain\MonoLog;

date_default_timezone_set("America/Lima");
try {
    echo "entro1 <br>";

    /*$log = new Logger('logname');
    $log->pushHandler(new StreamHandler(__DIR__.'/../logs/logger.log', Logger::WARNING));

    $log->warning('Warning 0001');
    $log->error('Error 0002');*/
    $errorLog = 'ERROR 00001';
    $log = new MonoLog();
    //var_dump($log);die;
    //$log->error($errorLog);
    $log->alert($errorLog);
    //var_dump($log);
}

catch (\Exception $e) {
    echo $e->getMessage();exit;
}

//$log->pushHandler(new \Monolog\Handler\RotatingFileHandler())
