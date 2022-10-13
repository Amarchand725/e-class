<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'name' => 'required'
		];
		return $rules;
    }
}
