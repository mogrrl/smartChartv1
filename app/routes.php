<?php

Route::get('/', function()
{
	$linktopreffix='/charts/';
	$pages=array();
		foreach (Page::all() as  $v) {
			$pages[$v->pagename]=$v->pagedescription;
		}

	if (isset($_GET['user'])) {
		$user=$_GET['user'];
		$userlink='?user='.$user;
	}
	else {
		$user='unregistered user';
		$userlink='';
	}
	return View::make('index',compact('linktopreffix','pages','user','userlink'))
	->with('title','Home');
});

Route::controller('charts','ChartsController');
Route::controller('temp','TemporaluserController');

