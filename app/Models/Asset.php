<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vessel;
use App\Models\State;
use App\Models\Vendor;
use App\Models\Category;



class Asset extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'SerialNumber ',
        'PurchaseDate',
        'VesselDesc',
        'DeviceName',
         'DelPort',
         'DelETA',
         'DeliveryDetail',
         'WEDate',
         'Price',
         'Maker',
         'Model',
         'Location',
         'SystemProvider',
         'Connectivity',
         'SuppProv',
         'Processor',
         'OS',
         'WinKey',
         'IPAdd',
         'Gateway',
         'CPUSpeed',
         'HardDisk',
         'RAM',
        'Vessel',
         'State',
         'Vendor',
         'Category'
    ];

    protected $table = 'assets';

    public function vessel(){
        return $this ->belongsTo(Vessel::class, 'Vessel' , 'Vessel_Id');
    }

    public function state(){
        return $this ->belongsTo(State::class, 'State' , 'State_Id');
    }

    public function vendor(){
        return $this ->belongsTo(Vendor::class, 'Vendor' , 'Vendor_Id');
    }

    public function category(){
        return $this ->belongsTo(Category::class, 'Category' , 'Category_Id');
    }

  
}
