<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/blog/{url}', [FrontendController::class, 'blogDetails']); //Ep_25(03:00)

/*********************Backend Urls and Pages Start *********************/
Route::group(['middleware' => 'auth'], function(){
							
	// User Dashboard Start
	// Route::get ('/{userName}/dashboard', [BackendController::class, 'userDashboard']);
	Route::get ('/user/dashboard', [BackendController::class, 'userDashboard']);
	Route::GET ('/user/createBlog', [BackendController::class, 'createBlogView']);
	Route::POST('/user/blogCreate', [BackendController::class, 'create']);
	// User Awaiting Blogs
	Route::GET ('/user/awaitingBlogs', [BlogController::class, 'userAwaitingBlogs']);
	Route::POST('/user/getUserAwaitingBlogs', [BlogController::class, 'getUserAwaitingBlogs']);
	Route::GET ('/user/approvedBlogs', [BlogController::class, 'userApprovedBlogs']);
	Route::POST('/user/getUserApprovedBlogs', [BlogController::class, 'getUserApprovedBlogs']);
	Route::GET ('/user/editBlog/{id}', [BlogController::class, 'editUserBlog']);
	Route::POST('/user/blogUpdate', [BlogController::class, 'update']);
	Route::GET ('/user/deleteBlog/{id}', [BlogController::class, 'deleteBlog']);
	// User Dashboard End
							
	// Admin Dashboard End
	Route::group(['middleware' => 'CheckRole'], function(){
		Route::get('/dashboard', [BackendController::class, 'dashboard']);
		Route::get('/all/users', [BackendController::class, 'allUsersView']);
		Route::get('/getAllUsers', [BackendController::class, 'getAllUsers']);
		Route::get('/deleteUser/{id}', [BackendController::class, 'deleteUser']);
		Route::get('/cms', [BackendController::class, 'cms']);
		Route::post('/createOrUpdateAbout', [BackendController::class, 'createOrUpdateAbout']);
		Route::post('/createOrUpdateContact', [BackendController::class, 'createOrUpdateContact']);
		Route::post('/createOrUpdateFooter', [BackendController::class, 'createOrUpdateFooter']);
							
		// Category Crud
		Route::GET ('/category', [CategoryController::class, 'index']);
		Route::POST('/addCategory', [CategoryController::class, 'create']);
		Route::POST('/GetAllCategories', [CategoryController::class, 'GetAllCategories']);
		Route::GET ('/getCategory/{id}', [CategoryController::class, 'getCategory']);
		Route::POST('/updateCategory', [CategoryController::class, 'updateCategory']);
		Route::GET ('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);
		// Route::resource('category', 'CategoryController');
							
		// Tag Crud
		Route::GET ('/tags', [TagController::class, 'index']);
		Route::POST('/addTag', [TagController::class, 'create']);
		Route::POST('/getAllTags', [TagController::class, 'getAllTags']);
		Route::POST('/getTag/{id}', [TagController::class, 'getTag']);
		Route::POST('/updateTag', [TagController::class, 'updateTag']);
		Route::GET ('/deleteTag/{id}', [TagController::class, 'deleteTag']);
							
		// Blog Crud
		/*Route::GET ('/blogs', [BlogController::class, 'index']);
		Route::POST('/getAllBlogs',[BlogController::class, 'getAllBlogs']);*/
		Route::GET ('/createBlog', [BlogController::class, 'createBlogView']);
		Route::POST('/blogCreate', [BlogController::class, 'create']);
		Route::GET ('/editBlog/{id}',[BlogController::class, 'editBlog']);
		Route::POST('/blogUpdate', [BlogController::class, 'update']);
		Route::GET ('/deleteBlog/{id}', [BlogController::class, 'deleteBlog']);
							
		// Awaiting Approval Blogs Admin
		Route::GET ('/awaitingApproval', [BlogController::class, 'awaitingApproval']);
		Route::POST('/getAwaitingApprovalBlogs', [BlogController::class, 'getAwaitingApprovalBlogs']);
		Route::GET('/approvedBlogs', [BlogController::class, 'approvedBlogs']);
		Route::POST('/getApprovedBlogs', [BlogController::class, 'getApprovedBlogs']);
		Route::GET ('/approveBlog/{id}', [BlogController::class, 'approveBlog']);
		Route::GET ('/awaitingBlog/{id}', [BlogController::class, 'awaitingBlog']);
						
		// Contact Messages View
		Route::GET('/contactMessages', [BackendController::class, 'contactMessages']);
		Route::get('/getAllMsg', [BackendController::class, 'getAllMsg']);
		Route::POST('/getMsg/{id}', [BackendController::class, 'getMsg']);
		Route::POST('/deleteMsg/{id}', [BackendController::class, 'deleteMsg']);
	});
});
/*********************Backend Urls and Pages End**********************/
							
/**********************Start Frontend Urls and Pages*******************/
Route::get('/aboutUs', [FrontendController::class, 'aboutUs']);
Route::get('/contactUs', [FrontendController::class, 'contactUs']);
Route::post('/createContactMessage', [FrontendController::class, 'createContactMessage']);
	/*Route::get('/blog', function(){
		$blogs = Blog::all();
		$blogs = Blog::where('active', 1)->orderby('id', 'desc')->paginate(3); //Ep_25(19:28)
		return view('frontend.blog', compact('blogs'));
	});
	Route::get('/blog_detail', function(){
		return view('frontend.blog_detail');
	});*/
							
	/*Route::get('/about', function(){
		return view('frontend.about');
	});
							
	Route::get('/contact', function(){
		return view('frontend.contact');
	});*/
/**********************End Frontend Urls and Pages*******************/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
