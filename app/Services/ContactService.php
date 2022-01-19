<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAll()
    {
        return $this->contactRepository->getAllContact();
    }

    public function getById($id)
    {
        return $this->contactRepository->getById($id);
    }

    public function saveContactData($request, $id)
    {
        return $this->contactRepository->save($request, $id);
    }
}
