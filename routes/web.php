<?php

	Route::get('/', function () {
		return view('welcome');
	});

Route::group(['middleware'=>['role'],'prefix'=>'admin','namespace'=>'Admin'], function(){ 

	Route::get('/', 'HomeController@index')->name('home');



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

	//insert update delete view project
	Route::resource('projects','ProjectsController');

	//insert update delete project_category
	Route::resource('project_categories','ProjectCategoriesController');

	//insert update delete client
	Route::resource('clients','ClientsController');

	//insert update delete client
	Route::resource('blogs','BlogsController');

	Route::get('/users-blog','BlogsController@user_blog')->name('blogs.user_blog');

	//insert update delete client
	Route::resource('blog_categories','BlogCategoriesController');

});


	Route::get('/blog', 'DashboardController@blog')->name('blog');

	Route::get('/blog_detail/{blog}', 'DashboardController@blog_detail')->name('blog_detail');

	Auth::routes();


