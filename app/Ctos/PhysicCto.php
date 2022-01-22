<?php

namespace App\Ctos;

use App\Models\Physic;

class PhysicCto
{
    protected $person;
    protected $physic;
    protected $contact;
    protected $address;

    public function __construct(
        Physic  $physic
    )
    {
        $this->physic = $physic;
    }

    public function getByCpf($cpf)
    {
        return $this->physic
            ->query()
            ->select('id','first_name','last_name','cpf','city', 'district', 'uf', 'county', 'zip_code', 'phone_number')
            ->join('persons', 'persons.id', '=', 'person_id')
            ->join('contacts', 'contacts.person_id', '=', 'id')
            ->join('addresses', 'addresses.person_id', '=', 'id')
            ->where('cpf', $cpf)
            ->first();
    }
}
