<?php

namespace App\Services;

use App\Repositories\PeopleRepository;

class PeopleService
{
    protected $peopleRepository;

    public function __construct(PeopleRepository $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }

    public function getAll()
    {
        return $this->peopleRepository->getAllPeople();
    }

    public function getById($id)
    {
        return $this->peopleRepository->getById($id);
    }

    public function savePeopleData($request)
    {
        return $this->peopleRepository->save($request);
    }
}
