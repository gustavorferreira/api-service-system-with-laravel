<?php

namespace App\Ctos;

use App\Services\AddressService;
use App\Services\ContactService;
use App\Services\PersonService;
use App\Services\PhysicService;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;

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
            return $exception->getMessage();
        }
    }
}
