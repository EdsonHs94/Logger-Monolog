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
    
    public function error()
    {
        try {

            $this->monolog->error('foo');
            
        } catch (Exception $e) {

        }
    }
}