<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\Physic;

class PersonRepository
{
    protected $person;
    protected $physic;

    public function __construct(
        Person $person,
        Physic $physic
    )
    {
        $this->person = $person;
        $this->physic = $physic;
    }

    public function getAllPerson()
    {
        return $this->physic
            ->query()
            ->select('id','first_name','last_name','cpf','city', 'district', 'uf', 'county', 'zip_code', 'phone_number')
            ->join('persons', 'persons.id', '=', 'person_id')
            ->join('contacts', 'contacts.person_id', '=', 'id')
            ->join('addresses', 'addresses.person_id', '=', 'id')
            ->get();
    }

    public function getById($id)
    {
        return $this->person
            ->query()
            ->find($id);
    }

    public function save($request)
    {
        $params = $this->params($request);
        return $this->person->query()
            ->create($params);
    }

    private function params($request): array
    {
        return collect($request)
            ->only('first_name', 'last_name')
            ->toArray();
    }
}
