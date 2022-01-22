<?php

namespace App\Ctos;

use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PersonService;
use App\Services\PhysicService;

class PersonCto
{
    protected $person;
    protected $physic;
    protected $contact;
    protected $address;

    public function __construct(
        PersonService  $personService,
        PhysicService  $physicService,
        ContactService $contactService,
        AddressService $addressService
    )
    {
        $this->person = $personService;
        $this->physic = $physicService;
        $this->contact = $contactService;
        $this->address = $addressService;
    }

    public function save($request)
    {
        if ($this->physic->verifyCpfExist($request)) {
            return response()->json(['message' => 'CPF already exists'], 409);
        }

        if ($this->contact->verifyEmailExist($request)) {
            return response()->json(['message' => 'E-mail already exists'], 409);
        }

        $person = $this->person->save($request);
        $this->physic->save($request, $person->id);
        $this->contact->save($request, $person->id);
        $this->address->save($request, $person->id);
        return response()->json(['message' => 'New record successfully inserted'], 201);
    }
}
