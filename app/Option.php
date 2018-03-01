<?php namespace QuizJSON;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {
	/* Disables timestamp conventions */
	public $timestamps = false;
	
	/* adds parent association */
	public function quiz()
    {
        return $this->belongs_to('QuizJSON\Question');
    }
}