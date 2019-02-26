<?php

	// Route::get('/', function () {
	// 	return view('welcome');
	// });

Route::group(['middleware'=>['role'],'prefix'=>'admin','namespace'=>'Admin'], function(){ 


	//insert update delete user
	Route::resource('users','UsersController');

	Route::get('/my-profile','UsersController@my_profile')->name('users.my_profile');

	Route::patch('/my-profile/{user}','UsersController@update_my_profile')->name('users.update_my_profile');

	Route::post('/update-photo','UsersController@update_photo')->name('users.update_photo');

	//insert update delete view department
	Route::resource('departments','DepartmentsController');

	//insert update delete view designation
	Route::resource('designations','DesignationsController');

	//insert update delete view industry
	Route::resource('industries','IndustriesController');

	//inser update delete view task_category
	Route::resource('task_categories','TaskCategoriesController');

	//inser update delete view task_category
	Route::resource('tasks','TasksController');

	Route::resource('tasks.task_logs','TaskLogsController');

	//task complete
	Route::post('/task_complete','TasksController@complete')->name('taskcomplete');

	//insert update delete view project
	Route::resource('projects','ProjectsController');

	//insert update delete project_category
	Route::resource('project_categories','ProjectCategoriesController');

	//insert update delete client
	Route::resource('clients','ClientsController');

	//department wise teamlead
	Route::resource('departments.team_leads','TeamLeadController');

	//insert update delete client
	Route::resource('blogs','BlogsController');

	//get user blog
	Route::get('/users-blogs','BlogsController@user_blog')->name('blogs.user_blog');

	//import blogs
	Route::post('/import','BlogsController@import')->name('blogs.import');

	//imports users
	Route::post('/user-import','UsersController@import')->name('users.user-import');

	//exports users
	Route::get('/export','UsersController@export')->name('users.export');

	//exports blogs
	Route::get('/blog-export','BlogsController@export')->name('blogs.export');

	//insert update delete client
	Route::resource('blog_categories','BlogCategoriesController');

});

	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/color','HomeController@color')->name('color');

	Route::get('/background_color','HomeController@background_color')->name('background_color');

	Route::get('blogs', 'DashboardController@blog')->name('blog');

	Route::get('/blog_detail/{blog}', 'DashboardController@blog_detail')->name('blog_detail');

	Auth::routes();


