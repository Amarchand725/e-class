<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Learning extends Model
{
    use SoftDeletes;

    protected $table = 'learnings';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'icon' => 'required','label' => 'required'
		];
		return $rules;
    }
}
