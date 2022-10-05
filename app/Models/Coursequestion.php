<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coursequestion extends Model
{
    use SoftDeletes;

    protected $table = 'coursequestions';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'question' => 'required'
		];
		return $rules;
    }
}
