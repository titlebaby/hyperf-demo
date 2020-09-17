<?php


namespace App\Exception\Handler;


use App\Exception\FooException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class FooExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // TODO: Implement handle() method.
        if ($throwable instanceof FooException) {
            //格式化输入
           $data =  json_encode([
                'code'=>$throwable->getCode(),
                'message'=>$throwable->getMessage()
            ],JSON_UNESCAPED_UNICODE);
           //阻止异常冒泡
            $this->stopPropagation();
            return $response->withStatus(500)->withBody(new SwooleStream($data));

        }
        //交给下一个异常处理器
        return $response;
        //或者不做处理直接屏蔽异常
    }

    /**
     * 判断该异常处理器是否要对该异常进行处理
     */
    public function isValid(Throwable $throwable): bool
    {
        // TODO: Implement isValid() method.
        return true;
    }


}