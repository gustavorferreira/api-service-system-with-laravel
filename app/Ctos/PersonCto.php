<?php

namespace App\Ctos;

use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PersonService;
use App\Services\PhysicService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PersonCto
{
    protected $person;
    protected $physic;
    protected $contact;
    protected $address;

    public function __construct(
        PersonService  $personService,
        PhysicService  $physicService,
        ContactService $contactService,
        AddressService $addressService
    )
    {
        $this->person = $personService;
        $this->physic = $physicService;
        $this->contact = $contactService;
        $this->address = $addressService;
    }

    public function save($request)
    {
        if ($this->validateInput($request)->fails()) {
            return response()->json(['message' => $this->validateInput($request)->errors()]);
        }

        DB::beginTransaction();
        try {
            $person = $this->person->save($request);
            $this->physic->save($request, $person->id);
            $this->contact->save($request, $person->id);
            $this->address->save($request, $person->id);
            DB::commit();
            return response()->json(['message' => 'New record successfully inserted'], 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Error inserting new record' . ': ' . $exception->getMessage()], 500);
        }
    }

    private function validateInput($request)
    {
        return Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'cpf' => 'required|max:11',
            'date_birth' => 'required',
            'genre' => 'required|max:1',
            'natioal_code' => 'required|max:2',
            'ddd_code' => 'required|max:2',
            'phone_number' => 'required|max:9',
            'email' => 'required|email',
            'city' => 'required',
            'district' => 'required',
            'uf' => 'required|max:2',
            'county' => 'required',
            'zip_code' => 'required|max:8'
        ], [
            'required' => 'The :attribute field is required.'
        ]);
    }
}
