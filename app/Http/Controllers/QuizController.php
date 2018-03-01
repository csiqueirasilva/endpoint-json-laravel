<?php namespace QuizJSON\Http\Controllers;

use QuizJSON\Services\QuizService;

class QuizController extends Controller {

  public function index(QuizService $quizService)
  {
  	/* Creates quiz test data in the database */
	$quizService->createTestData();
  
  	/* Finds persisted test data */
	$ret = $quizService->findTestData();
  
	/* Flush the persisted data as JSON to the HTTP response */
    return response()->json($ret, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  }

}