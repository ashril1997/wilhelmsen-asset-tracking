<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset;

class State extends Model
{
    use HasFactory;

    protected $fillable=[
      
        'State',
        'State_Id',
        'CreationDate'         
    ];

    protected $table = 'state';

    public function assets(){
        return $this->hasMany(Asset::class);
    }
}
