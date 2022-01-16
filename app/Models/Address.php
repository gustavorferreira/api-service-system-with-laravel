<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'id_people',
        'city',
        'district',
        'complement',
        'public_place',
        'uf',
        'county',
        'zip_code',
        'status'
    ];
}
