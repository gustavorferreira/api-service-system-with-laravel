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

    public function getAll()
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
            ->join('persons', 'persons.id', '=', 'person_id')
            ->join('contacts', 'contacts.person_id', '=', 'id')
            ->join('addresses', 'addresses.person_id', '=', 'id')
            ->where('cpf', $cpf)
            ->first();
    }

    public function save($request, $id)
    {
        return (new $this->physic([
            'person_id' => $id,
            'cpf' => $request->get('cpf'),
            'date_birth' => $request->get('date_birth'),
            'genre' => $request->get('genre')
        ]))->save();
    }
}
