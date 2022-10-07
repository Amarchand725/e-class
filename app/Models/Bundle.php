<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bundle extends Model
{
    use SoftDeletes;

    protected $table = 'bundles';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'course_ids' => 'required','title' => 'required','short_detail' => 'required','banner' => 'required','start_from' => 'required','end_date' => 'required'
		];
		return $rules;
    }

    static function getEditValidationRules(){
        $rules = [
		    'course_ids' => 'required','title' => 'required','short_detail' => 'required','start_from' => 'required','end_date' => 'required'
		];
        return $rules;
    }

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'slug', 'user_slug');
    }
}
