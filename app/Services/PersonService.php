<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAll()
    {
        return $this->personRepository->getAll();
    }

    public function getById($id)
    {
        return $this->personRepository->getById($id);
    }

    public function save($request)
    {
        return $this->personRepository->save($request);
    }
}
