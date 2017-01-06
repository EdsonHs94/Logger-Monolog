<?php
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 1/5/17
 * Time: 12:21 PM
 */

namespace Neoauto\Domain;


interface ILog
{
    public function error($message);

    public function info($message);

    public function debug($message);

    public function warning($message);

    public function alert($message);

    public function emergency($message);
}