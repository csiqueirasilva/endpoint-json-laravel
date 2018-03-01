<?php namespace QuizJSON;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {
	/* Disables timestamp conventions */
	public $timestamps = false;
	
	/* Adds one-to-many association */
	public function questions()
    {
        return $this->hasMany('QuizJSON\Question', 'quiz', 'id');
    }
	
}