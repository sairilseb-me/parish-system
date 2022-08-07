<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey = 'id'; 
    protected $keyType = 'string';
    protected $fillable = ['id', 'firstName', 'lastName', 'birthDate', 'gender', 'fathersName', 'mothersName', 'contact', 'barangay', 'municipality', 'province'];

    public function baptism(){
        return $this->hasOne(Baptism::class, 'client_id');
    }
}
