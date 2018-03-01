<?php namespace QuizJSON\Services;
	
use QuizJSON\Option;
use QuizJSON\Question;

class OptionService {
	
	public function formatTestData(Option $option) {
		$copy = $option->replicate();
		$copy['id'] = strval($option['id']);
		unset($copy['question']);
		return $copy;
	}
	
	public function createTestData(Question $question) {
		/* Erases previous data */
		Option::getQuery()->delete(); // or ::truncate()
		$ret = new \ArrayObject();
		$o1 = new Option();
		$o1->id = 1;
		$o1->text = "Front-end";
		$o1->value = "front-end";
		$o1->question = $question->id;
		$o1->save();
		$ret->append($o1);
		$o2 = new Option();
		$o2->id = 2;
		$o2->text = "Back-end";
		$o2->value = "back-end";
		$o2->question = $question->id;
		$o2->save();
		$ret->append($o2);
		return $ret;
	}
	
}