<?php


namespace App\Aspect;


use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Hyperf\Di\Annotation\Aspect;
/**
 * @Aspect
 * Class FooAspect
 * @package App\Aspect
 */
class FooAspect extends AbstractAspect
{
    //要切入的类，可以多个，亦可通过 :: 标识到具体的某个方法，通过*可以模糊匹配
    public $classes = [
        SomeClass::class,
        'App\Service\SomeClass::someMethod',
        'App\Service\SomeClass::Method'

    ];
    //要切入的注解，具体切入的还是使用了这些注解的类，仅可切入类注解和类方法注解
    public $annotations = [
        SomeAnnotation::class
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        //切面切入后，执行对应的方法会由此来负责
        //$proceedingJoinPoint 为连接点，通过该类的process()方法调用原方法并获得结果
        // 在调用前进行某些处理
        $res = $proceedingJoinPoint->process();
        // 在调用后进行某些处理
        return $res;
    }

}