<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;

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
        'images'
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

    #[SearchUsingPrefix(['make', 'model'])]
    #[SearchUsingFullText(['name'])]
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'make' => $this->make,
            'model' => $this->model,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
