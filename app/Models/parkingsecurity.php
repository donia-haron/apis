<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingsecurity extends Model
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
        'created_at',
    ];
    use HasFactory;
}
