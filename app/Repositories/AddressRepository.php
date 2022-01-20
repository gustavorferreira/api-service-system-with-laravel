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
        $address = new $this->address;

        $address->person_id = $id;
        $address->city = $request->get('city');
        $address->district = $request->get('district');
        $address->complement = $request->get('complement');
        $address->public_place = $request->get('public_place');
        $address->uf = $request->get('uf');
        $address->county = $request->get('county');
        $address->zip_code = $request->get('zip_code');

        $address->save();
        return $address;
    }
}
