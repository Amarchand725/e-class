<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $table = 'userprofiles';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'user_id' => 'required','role_id' => 'required'
		];
		return $rules;
    }
}
