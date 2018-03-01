<?php namespace QuizJSON\Http\Controllers;

use QuizJSON\Services\QuizService;

class QuizController extends Controller {

  public function index(QuizService $quizService)
  {
	$ret = $quizService->createTestData();
  
/*	$quiz = new Quiz();
	$option->id = 123 * rand();
	$option->text = "teste";
	$option->value = "teste2";
	$option->save();
	*/
    return $ret;
  }

}