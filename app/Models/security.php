<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class security extends Model
{
    public $timestamps = false;
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'id',
        'name',
        'address',
        'email',
        'gender',
        'phone',
        'status',
        'dob',
        'work_hours',
        'date',
    ];
    use HasFactory;
}
