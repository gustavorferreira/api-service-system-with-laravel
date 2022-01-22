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
        $this->physicRepository->getAll();
    }

    public function getById($id)
    {
        return $this->physicRepository->getById($id);
    }

    public function getByCpf($cpf)
    {
        return $this->physicRepository->getByCpf($cpf);
    }

    public function verifyCpfExist($request)
    {
        return $this->physicRepository->verifyCpfExist($request);
    }

    public function save($request, $id)
    {
        return $this->physicRepository->save($request, $id);
    }
}
