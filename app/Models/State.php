<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'country_id' => 'required','name' => 'required'
		];
		return $rules;
    }

    public function hasCountry()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
