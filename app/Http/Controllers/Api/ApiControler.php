<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\People\PeopleService;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    protected $peoples;

    public function __construct(PeopleService $peoples)
    {
        $this->peoples = $peoples;
    }

    public function index()
    {
        return response()->json($this->peoples->getAll());
    }

    public function show($id)
    {
        return response()->json($this->peoples->find($id));
    }

    public function register(Request $request)
    {
        return response()->json($this->peoples->store($request->all()));
    }
}
