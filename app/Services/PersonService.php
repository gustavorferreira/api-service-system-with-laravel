<?php

namespace App\Services;

use App\Ctos\PersonCto;
use App\Repositories\PersonRepository;

class PersonService
{
    protected $personRepository;
    protected $personCto;

    public function __construct(
        PersonRepository $personRepository,
        PersonCto $personCto
    )
    {
        $this->personRepository = $personRepository;
        $this->personCto = $personCto;
    }

    public function getAll()
    {
        return $this->personRepository->getAll();
    }

    public function save($request)
    {
        return $this->personRepository->save($request);
    }

    public function register($request)
    {
        return $this->personCto->save($request);
    }
}
