<?php

namespace App\Repositories;

use App\Models\People;

class PeopleRepository
{
    protected $people;

    public function __construct(People $people)
    {
        $this->people = $people;
    }

    public function getAllPeople()
    {
        return $this->people
            ->all();
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
