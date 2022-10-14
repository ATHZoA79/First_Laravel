<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $qty
 */
class ShoppingCart extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'product_id', 'user_id', 'qty'];

    // Relation to product
    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    // Relation to user
    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
