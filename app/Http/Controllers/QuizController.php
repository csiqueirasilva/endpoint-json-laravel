<?php namespace QuizJSON\Http\Controllers;

use QuizJSON\Services\QuizService;

class QuizController extends Controller {

  public function index(QuizService $quizService)
  {
  	/* Creates quiz test data */
	$quizService->createTestData();
  
  	/* Finds persisted test data */
	$ret = $quizService->findTestData();
  
	/* Flush the persisted data as JSON to the response */
    return $ret;
  }

}