<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function news()
    {
        return $this
            ->hasMany(News::class)
            ->setQuery(
                News::query()
                    ->whereIn('category_id', $this->getNestedChildren()->pluck('id'))
                    ->toBase()
            );
    }

    public function getNestedChildren()
    {
        $categories = collect([$this]);

        foreach ($this->children as $child) {
            $categories = $categories->merge($child->getNestedChildren());
        }

        return $categories;
    }
}
