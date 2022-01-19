<?php

namespace App\Interfaces\People;

interface PeopleInterface
{
    public function getAll();
    public function find($id);
    public function create($request);
}
