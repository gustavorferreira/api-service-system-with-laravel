<?php

namespace App\Http\Controllers\Api;

use App\Ctos\PhysicCto;
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
        PhysicCto $physicCto
    )
    {
        $this->person = $personService;
        $this->personCto = $personCto;
        $this->physic = $physicCto;
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
