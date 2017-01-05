<?php
namespace Neoauto\Infrastructure;

use Neoauto\Common\Adapter\AdapterMonoLog;
use Neoauto\Common\Adapter\AdapterCloudWatch;

class FactoryLog
{
    private $adapterLog;
    private $adapterCloudWatch;
    
    public function __construct()
    {
    }
    
    public function setMonolog(AdapterMonoLog $adapterLog)
    {
        $this->adapterLog = $adapterLog->getClientLog();
        
    }

    /**
     * @return \Monolog\Logger
     * @throws \Exception
     */
    public function getMonolog()
    {
        return $this->adapterLog;
    }

    public function getCloudWatch()
    {
        return $this->adapterCloudWatch;
    }

    public function setCloudWatch(AdapterCloudWatch $adapterCloudWatch)
    {
        $this->adapterCloudWatch = $adapterCloudWatch;
    }
    
}