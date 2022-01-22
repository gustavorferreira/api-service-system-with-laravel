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

    public function save($request, $id)
    {
        return $this->addressRepository->save($request, $id);
    }
}
