<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_date',
        'total_amount',
        'status',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function calculatedPriceByQuantity()
    {
        return $this->orderDetails->sum(function ($orderDetail) {
            return $orderDetail->unit_price * $orderDetail->quantity;
        });
    }
}
