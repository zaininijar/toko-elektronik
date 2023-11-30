<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingChart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'qty'
    ];

    /**
     * Get the product that owns the ShoppingChart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}