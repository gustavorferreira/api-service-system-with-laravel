<?php

namespace App\Services\People;

use App\Interfaces\People\PeopleInterface;
use App\Models\People;
use function collect;

class PeopleService implements PeopleInterface
{

    public function getAll()
    {
        return People::all();
    }

    public function find($id)
    {
        return People::query()->find($id);
    }

    public function create($request)
    {
        $params = $this->params($request);
        return People::query()->create($params);
    }

    private function params($request)
    {
        return collect($request)->only('first_name', 'last_name')->toArray();
    }
}
