<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Physic;

class RegisterService
{
    protected $people;
    protected $physic;
    protected $contact;
    protected $address;

    public function __construct(
        PeopleService $peopleService,
        PhysicService $physicService,
        ContactService $contactService,
        AddressService $addressService
    )
    {
        $this->people = $peopleService;
        $this->physic = $physicService;
        $this->contact = $contactService;
        $this->address = $addressService;
    }

    public function saveNewRegister($request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'cpf' => 'required',
            'date_birth' => 'required',
            'genre' => 'required',
            'natioal_code' => 'required',
            'ddd_code' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'city' => 'required',
            'district' => 'required',
            'uf' => 'required',
            'county' => 'required',
            'zip_code' => 'required'
        ]);

        if ($this->verifyCpfExist($request)) {
            return response()->json(['message' => 'CPF already exists'], 409);
        }

        if ($this->verifyEmailExist($request)) {
            return response()->json(['message' => 'E-mail already exists'], 409);
        }

        $people = $this->people->savePeopleData($request);
        $this->physic->savePhysicData($request, $people->id);
        $this->contact->saveContactData($request, $people->id);
        $this->address->saveAddressData($request, $people->id);
        return response()->json(['message' => 'New record successfully inserted'], 201);
    }

    private function verifyCpfExist($request)
    {
        return Physic::query()
            ->where('cpf', $request->get('cpf'))
            ->first('cpf');
    }

    private function verifyEmailExist($request)
    {
        return Contact::query()
            ->where('email', $request->get('email'))
            ->first('email');
    }
}
