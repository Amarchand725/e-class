<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courseannouncement extends Model
{
    use SoftDeletes;

    protected $table = 'courseannouncements';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'announcement' => 'required'
		];
		return $rules;
    }
}
