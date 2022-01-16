<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = [
        'id_people',
        'natioal_code',
        'ddd_code',
        'phone_number',
        'email',
        'observation',
        'status'
    ];
}
