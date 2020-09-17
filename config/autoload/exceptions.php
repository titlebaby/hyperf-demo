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
return [
    'handler' => [
        // 这里的 http 对应 config/autoload/server.php 内的 server 所对应的 name 值
        'http' => [
            App\Exception\Handler\BusinessExceptionHandler::class,
            \App\Exception\Handler\FooExceptionHandler::class,
        ],
    ],
];
