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

    private function verifyCpfExist($request)
    {
        return $this->physicRepository->verifyCpfExist($request);
    }

    public function save($request, $id)
    {
        if ($this->verifyCpfExist($request)) {
            return response()->json(['message' => 'CPF already exists'], 409);
        }

        return $this->physicRepository->save($request, $id);
    }
}
