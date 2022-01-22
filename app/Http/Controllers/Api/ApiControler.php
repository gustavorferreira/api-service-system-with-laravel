<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PersonService;
use App\Services\PhysicService;
use Illuminate\Http\Request;
use App\Ctos\PersonCto;

class ApiControler extends Controller
{
    protected $person;
    protected $personCto;
    protected $physic;

    public function __construct(
        PersonService $personService,
        PersonCto $personCto,
        PhysicService $physicService
    )
    {
        $this->person = $personService;
        $this->personCto = $personCto;
        $this->physic = $physicService;
    }

    public function show($cpf)
    {
        return $this->physic->getByCpf($cpf);
    }

    public function store(Request $request)
    {
        return $this->personCto->save($request);
    }
}
