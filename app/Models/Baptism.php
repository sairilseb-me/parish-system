<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Baptism extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $cast = ['sponsors'=>'array'];
    protected $fillable = ['client_id','baptised_date', 'priest', 'sponsors', 'dated', 'series_of', 'book_number', 'page', 'purpose'];

    public function priest(){
        return $this->hasOne(Priest::class);
    }

    public function client(){
        return $this->hasMany(Client::class);
    }
}
