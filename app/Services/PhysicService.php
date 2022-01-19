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

    public function getAll()
    {
        $this->physicRepository->getAllPhysic();
    }

    public function getById($id)
    {
        $this->physicRepository->getById($id);
    }

    public function savePhysicData($request, $id)
    {
        return $this->physicRepository->save($request, $id);
    }
}
