<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobListingCategory extends Model
{
    protected $fillable = ['name', 'information'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_job_listing_categories', 'job_listing_category_id', 'category_id');
    }

    public function jobListings(): HasMany
    {
        return $this->hasMany(JobListing::class, 'job_listing_category_id');
    }
}
