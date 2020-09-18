<?php

declare(strict_types=1);
namespace App\Service;

use Hyperf\Cache\Annotation\Cacheable;

class DemoService
{
    /**
     * @Cacheable(prefix="cache", value="_#{id}", listener="user-update")
     * @param int $id
     */
    public function getCache(int $id)
    {
        return $id . '_' . uniqid();
    }

}