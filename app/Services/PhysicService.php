<?php

namespace App\Services;

use App\Repositories\PhysicRepository;

class PhysicService
{
    protected $physicRepository;

    public function __construct(PhysicRepository $physicRepository)
    {
        $this->physicRepository = $physicRepository;
    }

    public function verifyCpfExist($request)
    {
        return $this->physicRepository->exist($request);
    }

    public function save($request, $id)
    {
        return $this->physicRepository->save($request, $id);
    }
}
