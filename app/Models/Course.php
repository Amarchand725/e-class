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
            'title' => ['required', 'string', 'max:191', 'unique:courses'],
            'thumbnail' => 'required'
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
    public function hasCategory()
    {
        return $this->hasOne(Category::class, 'slug', 'category_slug');
    }

    public function hasInstitute()
    {
        return $this->hasOne(Institute::class, 'slug', 'institute_slug');
    }
    public function hasInstructor()
    {
        return $this->hasOne(User::class, 'slug', 'instructor_slug');
    }
}
