<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable=[
      
        'VendorName',
        'Vendor_Id',
        'CreationDate'           
    ];

    protected $table = 'vendor';

    public function assets(){
        return $this->hasMany(Asset::class);
    }
}
