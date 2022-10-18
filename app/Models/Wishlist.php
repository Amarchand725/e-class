<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use SoftDeletes;

    protected $table = 'wishlists';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
            'product_slug' => ['required', 'string', 'max:191', 'unique:wishlists'],
		];
		return $rules;
    }

    public function hasProduct()
    {
        return $this->hasOne(Course::class, 'slug', 'product_slug');
    }
}
