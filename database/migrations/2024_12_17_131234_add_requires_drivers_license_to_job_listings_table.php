<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->boolean('requires_drivers_license')->default(0)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropColumn('requires_drivers_license');
        });
    }

};
