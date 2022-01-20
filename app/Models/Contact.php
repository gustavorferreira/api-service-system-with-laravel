<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'person_id';
    protected $fillable = [
        'person_id',
        'natioal_code',
        'ddd_code',
        'phone_number',
        'email',
        'observation'
    ];

    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
