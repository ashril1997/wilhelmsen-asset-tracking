<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('SerialNumber', 20)->nullable();
            $table->date('PurchaseDate')->nullable();
            $table->string('VesselDesc', 255)->nullable();
            $table->integer('Vessel', 11);
            $table->string('DeviceName', 50)->nullable();
            $table->string('IPAdd', 20)->nullable();
            $table->string('Subnet', 20)->nullable();
            $table->string('Gateway', 20)->nullable();
            $table->string('Maker', 30)->nullable();
            $table->string('Model', 50)->nullable();
            $table->date('WEDate')->nullable();
            $table->integer('State', 11);
            $table->integer('Category', 11);
            $table->string('WinKey', 30)->nullable();
            $table->string('Processor', 100)->nullable();
            $table->integer('Vendor', 11)->nullable();
            $table->integer('Price', 11)->nullable();
            $table->string('DeliveryDetail', 255)->nullable();
            $table->string('DelPort', 50)->nullable();
            $table->date('DelETA')->nullable();
            $table->timestamp('CreationDate')->nullable();
            $table->timestamp('DeliveryDate')->nullable();
            $table->string('Location', 50)->nullable();
            $table->string('SystemProvider', 50)->nullable();
            $table->string('Connectivity', 50)->nullable();
            $table->string('SuppProv', 50)->nullable();
            $table->string('OS', 50)->nullable();
            $table->string('CPUSpeed', 50)->nullable();
            $table->string('RAM', 50)->nullable();
            $table->string('HardDisk', 50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
