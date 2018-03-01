<?php namespace ApplicationName\Http\Controllers;

class HelpController extends \BaseController
{
  public function getResourceDocs($resource)
  {
    $view_path = 'api.help.'.strtolower($resource).'_resource';
    return view($view_path);
  }
}
