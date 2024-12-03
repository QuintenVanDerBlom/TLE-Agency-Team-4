<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryJobListingCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('category_job_listing_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('job_listing_category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('job_listing_category_id')->references('id')->on('job_listing_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_job_listing_category');
    }
}

