<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['name', 'information'];

    public function jobListings(): BelongsToMany
    {
        return $this->belongsToMany(JobListing::class, 'category_job_listing_categories', 'category_id', 'job_listing_category_id');
    }
}

