<?php namespace QuizJSON\Services;
	
use QuizJSON\Question;
use QuizJSON\Quiz;

class QuestionService {
	
	protected $optionService;
	
	public function __construct (OptionService $optionService) {
		$this->optionService = $optionService;
	}
	
	public function formatTestData(Question $question) {
		$copy = $question->replicate();
		$copy['id'] = strval($question['id']);
		unset($copy['quiz']);
		if(count($copy['options']) === 0) {
			unset($copy['options']);
		} else {
			foreach($copy->options as $k => $v) {
				$copy->options[$k] = $this->optionService->formatTestData($v);
			}
		}
		return $copy;
	}
	
	public function createTestData(Quiz $quiz) {
		Question::getQuery()->delete(); // or ::truncate()
		$ret = new \ArrayObject();
		$q1 = new Question();
		$q1->id = 1;
		$q1->text = "Qual o seu nome?";
		$q1->type = "text";
		$q1->quiz = $quiz->id;
		$q1->save();
		$ret->append($q1);
		$q2 = new Question();
		$q2->id = 2;
		$q2->text = "Para qual área você está aplicando?";
		$q2->type = "select";
		$q2->quiz = $quiz->id;
		$q2->save();
		$this->optionService->createTestData($q2);
		$ret->append($q2);
		return $ret;
	}
}