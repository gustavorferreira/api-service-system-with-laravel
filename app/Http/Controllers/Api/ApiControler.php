<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PeopleService;
use App\Services\PhysicService;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $people;
    protected $physic;

    public function __construct(
        PeopleService $peopleService,
        PhysicService $physicService
    )
    {
        $this->people = $peopleService;
        $this->physic = $physicService;
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
        return response()->json($people->id);
    }
}
