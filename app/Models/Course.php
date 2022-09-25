<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'courses';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'title' => 'required', 'thumbnail' => 'required'
		];
		return $rules;
    }

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function haveWhatLearns()
    {
        return $this->hasMany(WhatLearn::class, 'course_id', 'id');
    }
    public function haveCourseIncludes()
    {
        return $this->hasMany(CourseInclude::class, 'course_id', 'id');
    }
    public function haveTags()
    {
        return $this->hasMany(CourseTag::class, 'course_id', 'id');
    }
}
