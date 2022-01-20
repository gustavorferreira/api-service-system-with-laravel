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
        return $this->personRepository->getAllPerson();
    }

    public function getById($id)
    {
        return $this->personRepository->getById($id);
    }

    public function savePeopleData($request)
    {
        return $this->personRepository->save($request);
    }
}
