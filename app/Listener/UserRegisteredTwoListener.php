<?php


namespace App\Listener;


use App\Event\UserRegistered;
use Hyperf\Event\Contract\ListenerInterface;

class UserRegisteredTwoListener implements ListenerInterface
{
    public function listen(): array
    {
        //返回一个该监听器要监听的事件数组，可以同时监听多个事件
        return [
            UserRegistered::class,
        ];
    }

    public function  process(object $event)
    {
        //事件触发后该监听器要执行的代码（写在这里），比如该示例下的发送用户注册成功短信等
        //直接访问$event的$user属性获得时间触发是传递的参数值
        //$event->user;
        var_dump("=================");
        var_dump("事件触发后该监听器要执行啦two~~~2222~~~");
        var_dump("=================");

    }


}