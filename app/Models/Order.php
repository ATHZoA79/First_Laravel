<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $subtotal
 * @property integer $shipping_fee
 * @property integer $total
 * @property integer $product_qty
 * @property string $phone
 * @property string $name
 * @property string $email
 * @property string $address
 * @property integer $payment
 * @property integer $shipping_method
 * @property string $store_address
 * @property integer $order_status
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Order extends Model
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
    protected $fillable = ['subtotal', 'shipping_fee', 'total', 'product_qty', 'phone', 'name', 'email', 'address', 'payment', 'shipping_method', 'store_address', 'order_status', 'created_at', 'updated_at', 'usr_id'];

    public function detail() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
