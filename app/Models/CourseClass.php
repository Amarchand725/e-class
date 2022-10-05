<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseClass extends Model
{
    use SoftDeletes;

    protected $table = 'courseclasses';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'chapter_id' => 'required','title' => 'required','type' => 'required'
		];
		return $rules;
    }

    public function hasChapter()
    {
        return $this->hasOne(CourseChapter::class, 'id', 'chapter_id');
    }
}
