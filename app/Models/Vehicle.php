<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory, HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
             ->generateSlugsFrom(function($model) {
                $randomID = random_int(100000, 999999);
                return "{$randomID} {$model->name}";
            })
            ->saveSlugsTo('slug');
    }


     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
