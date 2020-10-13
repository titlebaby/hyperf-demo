<?php

declare(strict_types=1);
namespace App\Service;


use App\Event\UserRegistered;
use App\Model\HyUser;
use Hyperf\Cache\Annotation\Cacheable;
use Psr\EventDispatcher\EventDispatcherInterface;
use Hyperf\Di\Annotation\Inject;

class HyUserService
{
    /**
     * @Inject
     * @var EventDispatcherInterface
     */
    public $eventDispatcher;


    public function register($data){
        //我们假设存在User这个实体
        $user = new HyUser();
        $user->name   = $data['name'];
        $user->age    = $data['age'];
        $user->status = $data['status'];
        $res = $user->save();
        $this->eventDispatcher->dispatch(new UserRegistered($user));
        return $res;

    }

    public function addUser($data)
    {
        /** @var HyUser $user */
        $user         = new HyUser();
        $user->name   = $data['name'];
        $user->age    = $data['age'];
        $user->status = $data['status'];
        $res          = $user->save();
        return $res;
    }

    public function  getOne($id){
        $data = HyUser::query()->where('id', $id)->first();
        return $data;
    }


    public function  getList($page, $page_size){
       return  HyUser::query()->forPage($page, $page_size)->get()->toArray();
    }

    /**
     * @Cacheable(prefix="user", ttl=9000, listener="user-update")
     * @param $id
     */
    public function user($id){
        $user = HyUser::query()->where('id',$id)->first();
        if($user) {
            return $user->toArray();
        }
        return null;

    }

    /**
     * @Cacheable(prefix="user", ttl=7200, listener="USER_CACHE")
     */
    public function user1(int $id): array
    {
        $user = HyUser::query()->find($id);

        return [
            'user' => $user->toArray(),
            'uuid' => $this->unique(),
        ];
    }


    public function updateUser(int $id){
        $user = HyUser::query()->find($id);
        $user->name ="CachePut";
        $user->save();
        return [
            'user'=>$user->toArray(),
            'uuid'=>$this->unique()
        ];

    }

    public function unique(){
        return uniqid();
    }




}