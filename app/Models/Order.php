<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function haveOrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_number', 'order_number');
    }
    public function hasOrderDetail()
    {
        return $this->hasOne(OrderDetails::class, 'order_number', 'order_number');
    }
    public function hasPayment()
    {
        return $this->hasOne(Payment::class, 'order_number', 'order_number');
    }
}
