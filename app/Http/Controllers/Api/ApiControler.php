<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PeopleService;
use App\Services\PhysicService;
use Illuminate\Http\Request;

class ApiControler extends Controller
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

    public function index()
    {
        return response()->json($this->people->getAll());
    }

    public function show($id)
    {
        return response()->json($this->people->getById($id));
    }

    public function store(Request $request)
    {
        $people = $this->people->savePeopleData($request);
        $physic = $this->physic->savePhysicData($request, $people->id);
        $contact = $this->contact->saveContactData($request, $people->id);
        $address = $this->address->saveAddressData($request, $people->id);
        return response()->json($people->id);
    }
}
