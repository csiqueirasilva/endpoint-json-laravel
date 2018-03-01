<?php namespace QuizJSON\Services;
	
use QuizJSON\Quiz;
	
class QuizService {
	
	protected $questionService;
	
	public function __construct (QuestionService $questionService) {
		$this->questionService = $questionService;
	}
	
	public function createTestData() {
		Quiz::getQuery()->delete(); // or ::truncate()
		$ret = new Quiz();
		$ret->id = 1;
		$ret->name = "Teste de desenvolvimento";
		$ret->description = "Teste para desenvolvedor back-end";
		$ret->category = "Testes";
		$ret->base_points = 100;
		$ret->start_date = new \DateTime("2018-02-15 00:00:00");
		$ret->end_date = new \DateTime("2018-02-22 00:00:00");
		$ret->is_active = true;
		$ret->already_answered = false;
		$ret->save();
		$this->questionService->createTestData($ret);
		return $ret;
	}
}