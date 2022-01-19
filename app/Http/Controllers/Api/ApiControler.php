<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PeopleService;
use App\Services\PhysicService;
use App\Services\RegisterService;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $people;
    protected $physic;
    protected $contact;
    protected $address;
    protected $register;

    public function __construct(
        PeopleService $peopleService,
        PhysicService $physicService,
        ContactService $contactService,
        AddressService $addressService,
        RegisterService $registerService
    )
    {
        $this->people = $peopleService;
        $this->physic = $physicService;
        $this->contact = $contactService;
        $this->address = $addressService;
        $this->register = $registerService;
    }

    public function index()
    {
        return response()->json($this->people->getAll());
    }

    public function show($cpf)
    {
        return response()->json($this->physic->getByCpf($cpf));
    }

    public function store(Request $request)
    {
        return $this->register->saveNewRegister($request);
    }
}
