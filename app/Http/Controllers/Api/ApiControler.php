<?php

namespace App\Http\Controllers\Api;

use App\Ctos\PersonCto;
use App\Ctos\PhysicCto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $personCto;
    protected $physicCto;

    public function __construct(
        PersonCto $personCto,
        PhysicCto $physicCto
    )
    {
        $this->personCto = $personCto;
        $this->physicCto = $physicCto;
    }

    public function show($cpf)
    {
        return $this->physicCto->getByCpf($cpf);
    }

    public function store(Request $request)
    {
        return $this->personCto->save($request);
    }
}
