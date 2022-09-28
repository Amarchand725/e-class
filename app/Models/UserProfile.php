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
		    'role_id' => 'required'
		];
		return $rules;
    }

    public function hasCountryName()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function hasStateName()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
    public function hasCityName()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
