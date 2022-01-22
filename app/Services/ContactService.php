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

    public function verifyEmailExist($request)
    {
        return $this->contactRepository->verifyEmailExist($request);
    }

    public function save($request, $id)
    {
        return $this->contactRepository->save($request, $id);
    }
}
