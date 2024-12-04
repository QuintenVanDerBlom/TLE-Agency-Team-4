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

    // Definieer de relatie met JobListingCategory
    public function jobListingCategories()
    {
        return $this->belongsToMany(
            JobListingCategory::class, // Model waarmee de relatie is
            'category_job_listing_category', // Naam van de pivot-tabel
            'category_id', // Foreign key van categories in de pivot-tabel
            'job_listing_category_id' // Foreign key van job_listing_categories in de pivot-tabel
        );
    }
}

