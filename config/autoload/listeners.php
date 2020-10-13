<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
//事件调度器会到这里找监听器
return [
    Hyperf\ExceptionHandler\Listener\ErrorExceptionHandler::class,
    \App\Listener\UserRegisteredListener::class,
    \App\Listener\UserRegisteredTwoListener::class
];
