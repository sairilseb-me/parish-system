<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Baptism extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['client_id','baptised_date', 'priest_id', 'sponsors', 'dated', 'series_of', 'book_number', 'page', 'purpose'];
    protected $table = 'baptism';

    public function priest(){
        return $this->belongsTo(Priest::class, 'priest_id');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
