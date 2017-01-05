<?php
namespace Neoauto\Domain\Service;
use Neoauto\Domain\MonoLog;

class LoggerService
{
    /**
     * @var Publish
     */
    private $monolog;

    public function __construct()
    {
        $this->monolog = new MonoLog();
    }

    public function error()
    {
        return $this->monolog->error();
    }

}