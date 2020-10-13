<?php
declare(strict_types=1);
namespace App\Controller;


use App\Service\HyUserService;

use App\Utils\Log;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;


/**
 * @Controller()
 */
class HyUserController
{
    use BaseController;

    /**
     * @Inject()
     * @var HyUserService
     */
    protected  $hyUser;

    /**
     * @RequestMapping(path="/create", method="get,post")
     */
    public function create(RequestInterface $request){
        try {
            $data = $request->getParsedBody();
            $res = $this->hyUser->register($data);
            //$res = $this->hyUser->addUser($data);
            return $this->response->success($res);
        }catch (\Exception  $e) {

            return $e->getTrace();
        }

        return $res;
    }

    /**
     * @RequestMapping(path="/data/{id:\d+}",method="get,post")
     */
    public function  getData(RequestInterface $request, int $id){
        try {
            $res = $this->hyUser->getOne($id);
            return $this->response->success($res);
        } catch (\Exception  $e) {
            return $e->getMessage();
        }

    }
    /**
     * @RequestMapping(path="/list", method="get,post")
     */
    public function getList(RequestInterface $request)
    {
        $page     = $request->input('page', 1);
        $pageSize = $request->input('page_size', 10);
        $res = $this->hyUser->getList($page,$pageSize);
        return $this->response->success($res);
    }
    /**
     * @RequestMapping(path="/cache/{id:\d+}",method="get,post")
     */
    public function getOneByCache(RequestInterface $request, int $id)
    {
        $res = $this->hyUser->user($id);
        //$res = $this->hyUser->user1($id);
        return $this->response->success($res);
    }
    /**
     * @RequestMapping(path="/update/{id:\d+}",method="get,post")
     */
    public function update(RequestInterface $request, int $id)
    {

        Log::get('yyy',"test_log")->info('111212122 in 2', ['name'=>'raoxiaoya']);
        $res = $this->hyUser->updateUser($id);
        return $this->response->success($res);
    }
}