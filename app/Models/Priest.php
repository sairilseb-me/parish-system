<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','firstName', 'lastName'];

    public function baptism(){
        return $this->hasMany(Baptism::class);
    }
}
