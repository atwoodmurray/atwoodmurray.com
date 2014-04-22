<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	*/

	public function index()
	{
		return View::make('pages.index');
	}

	public function equipment()
	{
		return View::make('pages.equipment');
	}

	public function nope()
	{
		return View::make('pages.nope');
	}

}
