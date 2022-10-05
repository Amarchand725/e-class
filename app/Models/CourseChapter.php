<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseChapter extends Model
{
    use SoftDeletes;

    protected $table = 'coursechapters';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'name' => 'required'
		];
		return $rules;
    }
}
