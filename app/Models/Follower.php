<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use SoftDeletes;

    protected $table = 'followers';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'user_id' => 'required'
		];
		return $rules;
    }
}
