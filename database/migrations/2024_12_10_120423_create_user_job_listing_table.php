<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJobListingTable extends Migration
{
    public function up()
    {
        Schema::create('user_job_listing', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Verwijzing naar de User tabel
            $table->foreignId('vacature_id')->constrained('job_listings')->onDelete('cascade'); // Verwijzing naar de JobListing tabel
            $table->timestamps(); // Timestamp kolommen (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_job_listing');
    }
}
