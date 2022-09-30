<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courseinclude extends Model
{
    use SoftDeletes;

    protected $table = 'courseincludes';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'course_id' => 'required','icon' => 'required','detail' => 'required|max:191'
		];
		return $rules;
    }
}
