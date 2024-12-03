<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JobListing extends Model
{
    protected $fillable = ['name', 'company_id', 'salary', 'hours', 'job_listing_category_id', 'job_listing_requirement_id'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_job_listing', 'vacature_id', 'user_id');
    }

    public function requirements(): BelongsToMany
    {
        return $this->belongsToMany(Requirement::class, 'job_listing_requirement', 'job_listing_id', 'requirement_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_job_listing_categories', 'job_listing_category_id', 'category_id');
    }
}

