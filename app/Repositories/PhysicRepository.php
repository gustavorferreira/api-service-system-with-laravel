<?php

namespace App\Repositories;

use App\Models\Physic;

class PhysicRepository
{
    protected $physic;

    public function __construct(Physic $physic)
    {
        $this->physic = $physic;
    }

    public function getAll()
    {
        return $this->physic
            ->all();
    }

    public function getById($id)
    {
        return $this->physic
            ->query()
            ->find($id);
    }

    public function getByCpf($cpf)
    {
        /*
         return Destination::addSelect(['last_flight' => Flight::select('name')
            ->whereColumn('destination_id', 'destinations.id')
            ->orderByDesc('arrived_at')
            ->limit(1)
        ])->get();
        */
        return $this->physic
            ->query()
            ->where('cpf', $cpf)
            ->first();
    }

    public function exist($request)
    {
        return $this->physic->query()
            ->where('cpf', $request->get('cpf'))
            ->first('cpf');
    }

    public function save($request, $id)
    {
        return (new $this->physic([
            'person_id' => $id,
            'cpf' => $request->get('cpf'),
            'date_birth' => $request->get('date_birth'),
            'genre' => $request->get('genre')
        ]))->save();
    }
}
