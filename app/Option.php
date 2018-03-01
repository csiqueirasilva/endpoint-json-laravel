<?php namespace QuizJSON;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {
	public $timestamps = false;
	
	public function quiz()
    {
        return $this->belongs_to('Question');
    }
}