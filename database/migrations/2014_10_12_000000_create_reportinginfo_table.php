<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportingInfoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW reportinginfo 
                        AS SELECT assets.SerialNumber, EXTRACT(YEAR FROM assets.PurchaseDate) AS year, EXTRACT(MONTH FROM assets.PurchaseDate) AS month, vendor.VendorName, vessel.VesselName, assets.VesselDesc, category.Category, state.State, assets.DeliveryDetail, assets.DeliveryDate
                        FROM assets 
                        INNER JOIN category ON assets.Category=category.Category_Id
                        INNER JOIN vessel ON assets.Vessel=vessel.Vessel_Id
                        INNER JOIN state ON assets.State=state.State_Id
                        LEFT JOIN vendor ON assets.Vendor=vendor.Vendor_Id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW reportinginfo");
    }
}
