<?php


namespace App\Utils;



use Hyperf\Logger\Logger;
use Hyperf\Utils\ApplicationContext;

class Log
{
    public static function get(string $name = 'app',$group='default')
    {
        return ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name,$group);
    }
}