<?php namespace QuizJSON;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	public $timestamps = false;
	
	public function options()
    {
        return $this->hasMany('Option');
    }
	
	public function quiz()
    {
        return $this->belongs_to('Quiz');
    }
}