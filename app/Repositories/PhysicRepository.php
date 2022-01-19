<?php

namespace App\Repositories;

use App\Models\Physic;

class PhysicRepository
{
    protected $physic;

    public function __construct(Physic $physic)
    {
        $this->physic = $physic;
    }

    public function getAllPhysic()
    {
        return $this->physic
            ->all();
    }

    public function getById($id)
    {
        return $this->physic
            ->query()
            ->find($id);
    }

    public function save($request, $id)
    {
        $physic = new $this->physic;

        $physic->people_id = $id;
        $physic->cpf = $request->get('cpf');
        $physic->date_birth = $request->get('date_birth');
        $physic->genre = $request->get('genre');

        $physic->save();
        return $physic;
    }
}
