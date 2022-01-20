<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Physic;
use Illuminate\Support\Facades\Validator;

class RegisterService
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

    public function saveNewRegister($request)
    {
        if ($this->validateInput($request)->fails()) {
            return response()->json(['message' => $this->validateInput($request)->errors()]);
        }

        if ($this->verifyCpfExist($request)) {
            return response()->json(['message' => 'CPF already exists'], 409);
        }

        if ($this->verifyEmailExist($request)) {
            return response()->json(['message' => 'E-mail already exists'], 409);
        }

        $person = $this->person->save($request);
        $this->physic->save($request, $person->id);
        $this->contact->save($request, $person->id);
        $this->address->save($request, $person->id);
        return response()->json(['message' => 'New record successfully inserted'], 201);
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

    private function verifyCpfExist($request)
    {
        return Physic::query()
            ->where('cpf', $request->get('cpf'))
            ->first('cpf');
    }

    private function verifyEmailExist($request)
    {
        return Contact::query()
            ->where('email', $request->get('email'))
            ->first('email');
    }
}
