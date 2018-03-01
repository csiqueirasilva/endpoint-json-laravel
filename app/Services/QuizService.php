<?php namespace QuizJSON\Services;
	
use QuizJSON\Quiz;

define('QUIZ_SERVICE_TEST_ID_1', 1);

class QuizService {
	
	protected $questionService;
	
	public function __construct (QuestionService $questionService) {
		$this->questionService = $questionService;
	}

	public function findTestData() {
		return Quiz::with('questions.options')->get()->find(QUIZ_SERVICE_TEST_ID_1);
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