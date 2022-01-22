<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function getAll()
    {
        return $this->contact
            ->all();
    }

    public function getById($id)
    {
        return $this->contact
            ->query()
            ->find($id);
    }

    public function exist($request)
    {
        return $this->contact->query()
            ->where('email', $request->get('email'))
            ->first('email');
    }

    public function save($request, $id)
    {
        return (new $this->contact([
            'person_id' => $id,
            'natioal_code' => $request->get('natioal_code'),
            'ddd_code' => $request->get('ddd_code'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'observation' => $request->get('observation')
        ]))->save();
    }
}
