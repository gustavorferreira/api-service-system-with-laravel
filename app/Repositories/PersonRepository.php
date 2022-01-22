<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function getAll()
    {
        return $this->person
            ->all();
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
