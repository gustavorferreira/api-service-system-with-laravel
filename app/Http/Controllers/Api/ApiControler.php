<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PeopleService;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $peopleService;

    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    public function index()
    {
        return response()->json($this->peopleService->getAll());
    }

    public function show($id)
    {
        return response()->json($this->peopleService->getById($id));
    }

    public function store(Request $request)
    {
        return response()->json($this->peopleService->savePeopleData($request));
    }
}
