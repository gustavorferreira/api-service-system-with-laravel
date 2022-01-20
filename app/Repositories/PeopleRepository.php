<?php

namespace App\Repositories;

use App\Models\People;
use App\Models\Physic;

class PeopleRepository
{
    protected $people;
    protected $physic;

    public function __construct(
        People $people,
        Physic $physic
    )
    {
        $this->people = $people;
        $this->physic = $physic;
    }

    public function getAllPeople()
    {
        return $this->physic
            ->query()
            ->select('id','first_name','last_name','cpf','city', 'district', 'uf', 'county', 'zip_code', 'phone_number')
            ->join('peoples', 'peoples.id', '=', 'people_id')
            ->join('contacts', 'contacts.people_id', '=', 'id')
            ->join('addresses', 'addresses.people_id', '=', 'id')
            ->get();
    }

    public function getById($id)
    {
        return $this->people
            ->query()
            ->find($id);
    }

    public function save($request)
    {
        $params = $this->params($request);
        return $this->people->query()
            ->create($params);
    }

    private function params($request): array
    {
        return collect($request)
            ->only('first_name', 'last_name')
            ->toArray();
    }
}
