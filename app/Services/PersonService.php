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

    public function save($request)
    {
        return $this->personRepository->save($request);
    }
}
