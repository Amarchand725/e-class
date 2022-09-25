<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fact extends Model
{
    use SoftDeletes;

    protected $table = 'facts';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'image' => 'required','title' => 'required'
		];
		return $rules;
    }
}
