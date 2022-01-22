<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function getAll()
    {
        return $this->address
            ->all();
    }

    public function getById($id)
    {
        return $this->address
            ->query()
            ->find($id);
    }

    public function save($request, $id)
    {
        return (new $this->address([
            'person_id' => $id,
            'city' => $request->get('city'),
            'district' => $request->get('district'),
            'complement' => $request->get('complement'),
            'public_place' => $request->get('public_place'),
            'uf' => $request->get('uf'),
            'county' => $request->get('county'),
            'zip_code' => $request->get('zip_code')
        ]))->save();
    }
}
