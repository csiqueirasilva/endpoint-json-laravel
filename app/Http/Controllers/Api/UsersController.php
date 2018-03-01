<?php namespace ApplicationName\Http\Controllers;


class UsersController extends Controller {

  /*
  |--------------------------------------------------------------------------
  | Home Controller
  |--------------------------------------------------------------------------
  |
  | This controller renders your application's "dashboard" for users that
  | are authenticated. Of course, you are free to change or remove the
  | controller as you wish. It is just here to get your app started!
  |
  */

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard to the user.
  *
  * @return Response
  */
  public function index()
  {
    return view('home');
  }
  public function settings()
  {
    return view('settings');
  }
  public function privacy()
  {
    return view('privacy');
  }
  public function error()
  {
    return view('503');
  }
  public function play()
  {
    return view('play-ground')->with('message','hello you are watching fews video please upgrade to premium to see more!');
  }

}
