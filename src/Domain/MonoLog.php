<?php
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 1/4/17
 * Time: 4:40 PM
 */

namespace Neoauto\Domain;

use Neoauto\Common\Domain\BaseDomain;

class MonoLog extends BaseDomain implements ILog
{
    private $monolog;

    public function __construct()
    {
        parent::__construct();
        $factory       = $this->getFactoryLog();
        
        $this->monolog = $factory->getMonolog();
    }
    
    public function error($message)
    {
        try {

            $this->monolog->error($message);
            
        } catch (Exception $e) {

        }
    }

    public function info($message)
    {
        try {

            $this->monolog->error($message);

        } catch (Exception $e) {

        }
    }

    public function debug($message)
    {
        try {
            $this->monolog->debug($message);

        } catch (Exception $e) {

        }
    }
    public function warning($message){
        try {
            $this->monolog->warning($message);

        } catch (Exception $e) {

        }
    }

    public function alert($message){
        try {
            $this->monolog->alert($message);

        } catch (Exception $e) {

        }
    }
    public function emergency($message){
        try {
            $this->monolog->emergency($message);

        } catch (Exception $e) {

        }
    }
}