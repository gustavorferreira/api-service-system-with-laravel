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

    public function getByCpf($cpf)
    {
        return $this->physic
            ->query()
            ->select('id','first_name','last_name','cpf','city', 'district', 'uf', 'county', 'zip_code', 'phone_number')
            ->join('peoples', 'peoples.id', '=', 'people_id')
            ->join('contacts', 'contacts.people_id', '=', 'id')
            ->join('addresses', 'addresses.people_id', '=', 'id')
            ->where('cpf', $cpf)
            ->first();
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
