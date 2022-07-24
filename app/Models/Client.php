<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primarykey = 'id'; 
    protected $keyType = 'string';
    protected $fillable = ['id', 'firstName', 'lastName', 'birthDate', 'gender', 'contact', 'barangay', 'municipality', 'province'];
}
