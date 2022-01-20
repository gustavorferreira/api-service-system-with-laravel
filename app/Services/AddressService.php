<?php

namespace App\Services;

use App\Repositories\AddressRepository;

class AddressService
{
    protected $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getAll()
    {
        return $this->addressRepository->getAll();
    }

    public function getById($id)
    {
        return $this->addressRepository->getById($id);
    }

    public function save($request, $id)
    {
        return $this->addressRepository->save($request, $id);
    }
}
