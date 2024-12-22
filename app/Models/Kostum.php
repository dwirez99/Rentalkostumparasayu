<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kostum extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'kostum_id', 'title', 'cover', 'slug','harga'
    ];
    public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'title'
            ]
            ];
    }
    /**
     * The categories that belong to the Cosplay
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'kostum_category', 'kostum_id', 'category_id');
    }
}
