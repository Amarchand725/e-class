<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $table = 'sliders';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'title' => 'required','image' => 'required'
		];
		return $rules;
    }
}
