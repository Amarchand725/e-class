<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'name' => 'required'
		];
		return $rules;
    }

    public function haveChildren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function hasParent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
