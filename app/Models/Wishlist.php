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
		    'user_id' => 'required'
		];
		return $rules;
    }
}
