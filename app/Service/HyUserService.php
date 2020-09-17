<?php

declare(strict_types=1);
namespace App\Service;


use App\Model\HyUser;


class HyUserService
{
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

}