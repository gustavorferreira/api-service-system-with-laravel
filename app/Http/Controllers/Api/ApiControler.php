<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PersonService;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $person;

    public function __construct(
        PersonService $personService
    )
    {
        $this->person = $personService;
    }

    public function store(Request $request)
    {
        return $this->person->save($request);
    }
}
