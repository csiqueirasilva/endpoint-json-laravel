<?php namespace QuizJSON\Services;
	
use QuizJSON\Quiz;

define('QUIZ_SERVICE_TEST_ID_1', 1);

class QuizService {
	
	protected $questionService;
	
	public function __construct (QuestionService $questionService) {
		$this->questionService = $questionService;
	}

	public function findTestData() {
		$raw = Quiz::with('questions.options')->get()->find(QUIZ_SERVICE_TEST_ID_1);
		$safeCopy = $raw->replicate();
		// creating return object
		$formatted = array("data" => array());
		// setting values as specified
		$safeCopy->id = strval($raw->id);
		$safeCopy->alreadyAnswered = $safeCopy->already_answered;
		unset($safeCopy->already_answered);
		$safeCopy->basePoints = $safeCopy->base_points;
		unset($safeCopy->base_points);
		$safeCopy->endDate = $safeCopy->end_date;
		unset($safeCopy->end_date);
		$safeCopy->startDate = strval($safeCopy->start_date);
		unset($safeCopy->start_date);
		$safeCopy->isActive = $safeCopy->is_active;
		unset($safeCopy->is_active);
		foreach($safeCopy->questions as $k => $v) {
			$safeCopy->questions[$k] = $this->questionService->formatTestData($v);
		}
		$formatted['data'][0] = $safeCopy;
		return $formatted;
	}
	
	public function createTestData() {
		/* Erases previous data */
		Quiz::getQuery()->delete(); // or ::truncate()
		/* Creates quiz object data */
		$ret = new Quiz();
		$ret->id = QUIZ_SERVICE_TEST_ID_1;
		$ret->name = "Teste de desenvolvimento";
		$ret->description = "Teste para desenvolvedor back-end";
		$ret->category = "Testes";
		$ret->base_points = 100;
		$ret->start_date = new \DateTime("2018-02-15 00:00:00");
		$ret->end_date = new \DateTime("2018-02-22 00:00:00");
		$ret->is_active = true;
		$ret->already_answered = false;
		/* Persist data to database */
		$ret->save();
		/* Creates child entities */
		$this->questionService->createTestData($ret);
		return $ret;
	}
}