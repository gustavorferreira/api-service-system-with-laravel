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

    public function getAllContact()
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

    public function save($request, $id)
    {
        $contact = new $this->contact;

        $contact->person_id = $id;
        $contact->natioal_code = $request->get('natioal_code');
        $contact->ddd_code = $request->get('ddd_code');
        $contact->phone_number = $request->get('phone_number');
        $contact->email = $request->get('email');
        $contact->observation = $request->get('observation');

        $contact->save();
        return $contact;
    }
}
