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

    private function verifyEmailExist($request)
    {
        return $this->contactRepository->exist($request);
    }

    public function save($request, $id)
    {
        if ($this->verifyEmailExist($request)) {
            return response()->json(['message' => 'E-mail already exists'], 409);
        }

        return $this->contactRepository->save($request, $id);
    }
}
