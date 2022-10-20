<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasCourse()
    {
        return $this->hasOne(Course::class, 'slug', 'product_slug');
    }
    public function hasBundle()
    {
        return $this->hasOne(Bundle::class, 'slug', 'product_slug');
    }
    public function hasPayment()
    {
        return $this->hasOne(Payment::class, 'order_number', 'order_number');
    }
    public function hasOrder()
    {
        return $this->hasOne(Order::class, 'order_number', 'order_number');
    }
}
