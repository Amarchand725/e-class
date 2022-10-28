<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
            'topic' => ['required'],
            'thumbnail' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'meeting_url' => 'required',
            'email' => 'required',
		];
		return $rules;
    }

    public function hasHost()
    {
        return $this->hasOne(User::class, 'slug', 'host_slug');
    }
}
