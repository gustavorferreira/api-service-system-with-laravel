<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'peoples';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'status'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function physic()
    {
        return $this->hasOne(Physic::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
}
