<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'sku', 'description', 'price', 'old_price',
        'image', 'stock', 'is_active', 'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'old_price' => 'decimal:2',
            'stock' => 'integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /** Товар со скидкой: есть старая цена и она выше текущей. */
    protected function isOnSale(): Attribute
    {
        return Attribute::get(fn () => $this->old_price !== null && (float) $this->old_price > (float) $this->price);
    }

    /** Размер экономии («Save Up To $9»). */
    protected function discount(): Attribute
    {
        return Attribute::get(fn () => $this->is_on_sale
            ? number_format((float) $this->old_price - (float) $this->price, 2, '.', '')
            : '0.00');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): void
    {
        $query->where('is_featured', true);
    }

    public function scopeOnSale(Builder $query): void
    {
        $query->whereNotNull('old_price')->whereColumn('old_price', '>', 'price');
    }
}
