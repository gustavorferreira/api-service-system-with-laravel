<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PersonService;
use App\Services\PhysicService;
use App\Services\RegisterService;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $person;
    protected $physic;
    protected $contact;
    protected $address;
    protected $register;

    public function __construct(
        PersonService   $personService,
        PhysicService   $physicService,
        ContactService  $contactService,
        AddressService  $addressService,
        RegisterService $registerService
    )
    {
        $this->person = $personService;
        $this->physic = $physicService;
        $this->contact = $contactService;
        $this->address = $addressService;
        $this->register = $registerService;
    }

    public function index()
    {
        return response()->json($this->person->getAll());
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
