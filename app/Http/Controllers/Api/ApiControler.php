<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PersonService;
use Illuminate\Http\Request;
use App\Ctos\PersonCto;

class ApiControler extends Controller
{
    protected $person;
    protected $personCto;

    public function __construct(
        PersonService $personService,
        PersonCto $personCto
    )
    {
        $this->person = $personService;
        $this->personCto = $personCto;
    }

    public function store(Request $request)
    {
        return $this->personCto->save($request);
    }
}
