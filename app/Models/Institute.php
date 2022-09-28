<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institute extends Model
{
    use SoftDeletes;

    protected $table = 'institutes';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'logo' => 'required','name' => 'required','email' => 'required','mobile' => 'required','skill' => 'required','about' => 'required','is_verified' => 'required'
		];
		return $rules;
    }

    public function haveCourses()
    {
        return $this->hasMany(Course::class, 'institute_slug', 'slug');
    }
}
