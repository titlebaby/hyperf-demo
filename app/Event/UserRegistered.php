<?php


namespace App\Event;


class UserRegistered
{
    //要是公共属性，以便监听器对该属性的直接使用
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

}