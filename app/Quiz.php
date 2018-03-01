<?php namespace QuizJSON;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {
	public $timestamps = false;
	
	public function questions()
    {
        return $this->hasMany('Question');
    }
	
}