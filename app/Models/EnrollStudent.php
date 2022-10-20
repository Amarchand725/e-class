<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollStudent extends Model
{
    use HasFactory;

    protected $table = 'enrollstudents';
    protected $guarded = [];

    public function hasUser()
    {
        return $this->hasOne(User::class, 'slug', 'user_slug');
    }
    public function hasOrder()
    {
        return $this->hasOne(OrderDetails::class, 'product_slug', 'product_slug');
    }
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
