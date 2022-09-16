<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Vehicle extends Model
{
    use HasFactory, HasSlug, Searchable;

    protected $casts = [
        'published' => 'boolean',
        'features' => 'array',
        'sections' => 'array',
        'images' => 'array',
    ];

    protected $fillable = [
        'name',
        'make',
        'model',
        'body_type',
        'year',
        'price',
        'color',
        'engine',
        'fuel_type',
        'mileage',
        'door_count',
        'seat_count',
        'gearbox',
        'condition',
        'cover_path',
        'published',
        'user_id',
        'features',
        'sections',
        'images',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function ($model) {
                $randomID = random_int(100000, 999999);

                return "{$randomID} {$model->name}";
            })
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
