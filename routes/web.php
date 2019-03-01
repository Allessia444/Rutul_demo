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

	//insert update delete view task_category
	Route::resource('task_categories','TaskCategoriesController');

	//insert update delete view task_category
	Route::resource('project.tasks','TasksController');

	//insert update delete ttask log
	Route::resource('project.tasks.task_logs','TaskLogsController');

	//task complete
	Route::post('/task_complete','TasksController@complete')->name('taskcomplete');

	//insert update delete view project
	Route::resource('projects','ProjectsController');

	Route::get('/user-projects','ProjectsController@user_projects')->name('user_projects');
	//insert update delete project_category
	Route::resource('project_categories','ProjectCategoriesController');

	//insert update delete client
	Route::resource('clients','ClientsController');

	//department wise teamlead
	Route::resource('departments.team_leads','TeamLeadController');

	//insert update delete client
	Route::resource('blogs','BlogsController');

	//blog edit model
	Route::get('/blog_edit/{id}','BlogsController@blog_edit')->name('blog-edit');

	//blog update model
	Route::post('/blog-update','BlogsController@blog_update')->name('blog-update');

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

	//edit update site setting
	Route::get('/site-setting','SiteSettingsController@edit')->name('site_setting.edit');

	Route::post('/site-setting','SiteSettingsController@update')->name('site_setting.update');

});

Route::get('/', 'HomeController@index')->name('home');

//color
Route::get('/color','HomeController@color')->name('color');

Route::get('/task-category','HomeController@task_category')->name('task-category');

Route::get('/task-detail','HomeController@get_task_details')->name('task-detail');

Route::get('/get-task/{id}', 'HomeController@get_task')->name('get-task');

//task details by task_id
Route::get('/get-task-details/{id}', 'HomeController@get_task_details')->name('get-task-details');

//background color select in dropdowm
Route::get('/background_color','HomeController@background_color')->name('background_color');

//list blog
Route::get('blogs', 'DashboardController@blog')->name('blog');

//blog details
Route::get('/blog_detail/{blog}', 'DashboardController@blog_detail')->name('blog_detail');

Route::get('/login/github', 'Auth\LoginController@redirectToProvider')->name('github');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();


