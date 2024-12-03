<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    // Mass-assignable velden
    protected $fillable = ['name', 'location', 'category_id'];

    /**
     * Relatie: Een bedrijf heeft meerdere vacatures
     */
    public function jobListings(): HasMany
    {
        return $this->hasMany(JobListing::class, 'company_id');
    }

    /**
     * Relatie: Een bedrijf behoort tot een categorie
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

