<?php
namespace Neoauto\Domain;

use Neoauto\Common\Domain\BaseDomain;

class CloudWatch extends BaseDomain implements ILog
{
   /*
    * @var \Neoauto\Infrastructure\Dao\Factory\DaoFactoryEloquent
    */
    private $factoryEloquent;
    
    public function __construct()
    {
        parent::__construct();
        $this->getCloud;
        
    }
    
    public function error(){
        logica;
    }
    
}