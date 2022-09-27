<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrustCompany extends Model
{
    use SoftDeletes;

    protected $table = 'trustcompanies';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'name' => 'required',
            'logo' => 'required'
		];
		return $rules;
    }
}
