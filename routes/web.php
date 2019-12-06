<?php

use Unopicursos\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');

Route::get('login/{driver}','Auth\LoginController@redirectToProvider')->name('social_auth');
//Aqui va la devolucion de la app q nos redirige
Route::get('login/{driver}/callback','Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'courses'], function(){
	Route::group(['middleware'=> ['auth']], function() {
		Route::get('/subscribed','CourseController@subscribed')->name('courses.subscribed')->middleware('auth');
		Route::get('/{course}/inscribe','CourseController@inscribe')->name('courses.inscribe')->middleware('auth');
		Route::post('/add_review','CourseController@addReview')->name('courses.add_review')->middleware('auth');

		Route::group(['middleware'=>[sprintf("role:%s", \Unopicursos\Role::TEACHER)]], function() {

			/*Route::get('/create','CourseController@create')->name('courses.create');
			Route::post('/store','CourseController@store')->name('courses.store');
			Route::put('/{course}/update','CourseController@update')->name('courses.update');

			Route::get('/{slug}/edit','CourseController@edit')->name('courses.edit');
			Route::put('/{course}/update','CourseController@update')->name('courses.update');
			Route::delete('/{course}/destroy','CourseController@destroy')->name('courses.destroy');*/
			Route::resource('courses', 'CourseController');

		});
	});

	Route::get('/{course}','CourseController@show')->name('courses.detail');
});


Route::group(['middleware'=>['auth']], function(){
	Route::group(['prefix'=>'subscriptions'], function(){
		Route::get('/plans','SubscriptionController@plans')->name('subscriptions.plans');
		Route::get('/admin','SubscriptionController@admin')->name('subscriptions.admin');
		Route::post('/process_subscription','SubscriptionController@processSubscription')->name('subscriptions.process_subscripton');
		Route::post('/resume', 'SubscriptionController@resume')->name('subscriptions.resume');
		Route::post('/cancel', 'SubscriptionController@cancel')->name('subscriptions.cancel');
	});

	//Invoices es para las FACTURAS
	Route::group(['prefix'=>'invoices'], function(){
		Route::get('/admin','InvoiceController@admin')->name('invoices.admin');
		Route::get('/{invoice}/download','InvoiceController@download')->name('invoices.download');
	});

});

Route::get('/images/{path}/{attachment}', function($path, $attachment){
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if(File::exists($file)){
		return \Intervention\Image\Facades\Image::make($file)->response();
	}
});



Route::group(['prefix'=>'profile',"middleware"=>["auth"]], function(){
	Route::get('/','ProfileController@index')->name('profile.index');
	Route::put('/','ProfileController@update')->name('profile.update');
});

Route::group(['prefix'=>'solicitude'], function(){
	Route::post('/teacher','SolicitudController@teacher')->name('solicitude.teacher');
});



Route::group(['prefix'=>'teacher',"middleware"=>["auth"]], function(){
	Route::get('/courses','TeacherController@courses')->name('teacher.courses');
	Route::get('/students','TeacherController@students')->name('teacher.students');
	Route::post('/send_message_to_student','TeacherController@sendMessageToStudent')->name('teacher.send_message_to_student');
});

Route::group(['prefix'=>'admin',"middleware"=>["auth", sprintf("role:%s", \Unopicursos\Role::ADMIN)]], function(){
	Route::get('/courses','AdminController@courses')->name('admin.courses');
	Route::get('/courses_json','AdminController@coursesJson')->name('admin.courses_json');
	Route::post('/courses/updateStatus','AdminController@updateCourseStatus');

	Route::get('/students','AdminController@students')->name('admin.students');
	Route::get('/students_json','AdminController@studentsJson')->name('admin.students_json');
	Route::get('/teachers','AdminController@teachers')->name('admin.teachers');
	Route::get('/teachers_json','AdminController@teachersJson')->name('admin.teachers_json');

});




