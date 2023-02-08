<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset;

class Vessel extends Model
{
    use HasFactory;

    protected $fillable=[
      
        'VesselName',
        'Vessel_Id',
        'CreationDate'        
    ];

    protected $table = 'vessel';

    public function assets(){
        return $this->hasMany(Asset::class);
    }
}
