<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Physic;
use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PeopleService;
use App\Services\PhysicService;

class RegisterControler extends Controller
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

    public function registerData($request)
    {
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
        return $people->id;
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
