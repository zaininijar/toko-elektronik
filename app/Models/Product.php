<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_category_id',
        'name',
        'price',
        'quantity',
        'picture_path',
        'spesification',
        'description'
    ];

    public function reduceQuantity($quantityToReduce)
    {
        if ($this->quantity >= $quantityToReduce) {
            $this->quantity -= $quantityToReduce;
            $this->save();

            return true;
        }

        return false;
    }

    /**
     * Get the product_category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get all of the order_products for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Get all of the shopping_charts for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shopping_charts()
    {
        return $this->hasMany(ShoppingChart::class);
    }
}
