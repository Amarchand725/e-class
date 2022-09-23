<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasParent()
    {
        return $this->hasOne(Menu::class, 'id', 'parent_id');
    }
}
