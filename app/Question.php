<?php namespace QuizJSON;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	/* Disables timestamp conventions */
	public $timestamps = false;
	
	/* adds one-to-many association */
	public function options()
    {
        return $this->hasMany('QuizJSON\Option', 'question', 'id');
    }
	
	/* adds parent association */
	public function quiz()
    {
        return $this->belongs_to('QuizJSON\Quiz');
    }
}