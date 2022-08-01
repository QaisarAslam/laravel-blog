<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Role;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Traits\MyTrait;

class BlogController extends Controller
{
	use MyTrait;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	// Return Blogs Listing View
	public function index()
	{
		return view('backend.blogs');
	}
	public function getAllBlogs()
	{
		// $category = Category::select(['id', 'name', 'created_at', 'updated_at']);
		$blogs = Blog::all(); // or below
		// $blogs = Blog::where('active', '1')->get(); //Use 1 or 0 To see only active or inactive blogs respectively
		// dd($categories);
		return Datatables::of($blogs)
		->editColumn('user_id', function ($blog) {
			// $role = $blog->user->roles;
			// foreach ($role as $role1) {
			// 	if ($role1->name == 'admin') {
			// 		return "<span class='badge badge-danger badge-pill'>$role1->name</span>"."<span class='badge badge-success badge-pill'>".$blog->user->name."</span>";
			// 	}else{
					return "<span class='badge badge-success badge-pill'>".$blog->user->name."</span>";
			// 	}
			// }
		})
		->editColumn('category_id', function ($blog) {
			return "<span class='badge badge-dark badge-pill'>".$blog->category->name."</span>";
		})
		->editColumn('title', function ($blog) {
			return strip_tags($blog->title);
		})
		/*->addColumn('id', function (Blog $blog) {
			return $blog->tags->map(function($tag) {
				return "<span class='badge badge-info badge-pill'>".$tag->name."</span>";
			// })->implode('<br>');
			})->implode('&nbsp');
		})*/
		->editColumn('short_description', function ($blog) {
			return Str::words($blog->short_description, 3, ' ...'); //Ep_24(02:49)
		})
		->editColumn('active', function ($blog) {
			if ($blog->active == "1") {
			// return "<span class='badge badge-success badge-pill rounded-circle'>".$blog->active."</span>";
			return "<span class='badge badge-success badge-pill rounded'>Active</span>";
			}else{
				// return "<span class='badge badge-dark badge-pill rounded-circle'>".$blog->active."</span>";
				return "<span class='badge badge-dark badge-pill rounded'>Awaiting Approval</span>";
			}
		})
							
		/*->editColumn('description', function ($blog) {
			return Str::words($blog->description, 5, ' ...');
		})*/
		/*->editColumn('updated_at', function ($blog) {
			// return $blog->updated_at ? with(new Carbon($blog->updated_at))->format('Y/m/d')or('m/d/Y')or('d-M-Y') : '';;
			return $blog->updated_at ? with(new Carbon($blog->updated_at))->format('d-M-Y') : '';;
		})*/
		->rawColumns(['user_id', 'category_id', 'id', 'description', "active"])
		->make(true);
	}
							
	// Return Create Blog View
	public function createBlogView()
	{
		$categories = Category::all();
		$tags = Tag::all();
		return view('backend.createBlog', compact('categories', 'tags')); //or
		// return view('backend.createBlog', (['categories'=>$categories, 'tags'=>$tags])); //or
		// return view('backend.createBlog', (array('categories'=>$categories, 'tags'=>$tags)));
	}
							
	// Create Blog
	public function create(Request $request){
		// dd($request->all());
		/*$user = Auth::user(); // To Check Currently Login User Detail or ID
		dd($user->id);*/
		// dd($request->all());
		$active = $request->active == 'on' ? 1 : 0; //Ternary Operation Ep_19(10:18)
		// dd($active);
		// dd($request->file('image'));
							
		$this->validateBlog($request);
		// Image Upload Start
		$uploadedImage = $request->file('fileImage'); // Check file('name') is come or not in $request Ep-19_29:14
		// dd($uploadedImage); // get image all info
		$imageWithExt = $uploadedImage->getClientOriginalName();
		// dd($imageWithExt); // get image name with extension
		$imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
		// dd($imageName); // get only image name not extension name
		$imageExt = $uploadedImage->getClientOriginalExtension();
		// dd($imageExt); // get only extension name not image name
		$image = $imageName . time() . "." . $imageExt; // Image Manipulation
		/*// https://stackoverflow.com/questions/37274762/set-time-zone-in-php-for-pakistan/37274860
		date_default_timezone_set("Asia/Karachi");
		$image = $imageName."-".date("h:i:s A").".".$imageExt;*/
		$request->fileImage->move(public_path('/images/blogImages'), $image); //public_path() land to 'publicFolder'
		// dd($image1);
		// return $request->image;
		// Image Upload End
							
		$blog = Blog::create([
			'user_id' => $user->id,
			'category_id' => $request->category,
			'title' => $request->title,
			'url' => $request->url,
			'image' => $image,
			'image_alt' => $request->imageAlt,
			'meta' => $request->meta,
			'short_description' => $request->shortDescription,
			'description' => $request->description,
			'active' => $active,
		]);
		$blog->tags()->attach($request->tags);
		return redirect()->back()->with('success', 'Successful.'); //with() create session for a short time.
	}
	// Validation
	public function validateBlog($request)
	{
		// dd($request->all());
		$request->validate([
			'title' => 'required|min:3|max:255',
			'url' => 'required|min:3|max:255|unique:blogs',
			'category' => 'required',
			'tags' => 'required',
			'fileImage' => 'required|image|mimes:jpg,png,bmp,gif|max:2048',
			'imageAlt' => 'required|min:3|max:255',
			'meta' => 'required|min:3|max:255',
			'shortDescription' => 'required|min:3|max:500',
			'description' => 'required|min:11', //CKeditor field
	]);
		return $request;
	}
	public function editBlog($id){
		// dd($id);
		$blog = Blog::find($id);
		// dd($blog);
		if($blog){
			$categories = Category::all();
			$tags = Tag::all();
			/*
			foreach (auth()->user()->roles as $role){
				if ($role->id == 1){*/
					return view('backend.editBlog', compact('blog', 'categories', 'tags'));
				/*}
				else{
					return view('userPanel.editBlog', compact('blog', 'categories', 'tags'));
				}
			}
			*/
		}else{
			// return response("Not Found");
			return abort("404");
		}
}
							
	public function update(Request $request)
	{
		// dd($request->all());
		$blog = Blog::findOrFail($request->blog_id); // Now we will find this blog
		// dd($request->all());
		// dd($blog);
		$this->updateBlogValidation($request); // Now we will apply validation
		// dd('Success');
		// $active = $request->active == 'on' ? 1 : 0; // on or null
		// Check Auth is Admin or User
		foreach (auth()->user()->roles as $role) {
			if($role->id == 1){
				$active = $request->active == 'on' ? 1 : 0; // on or null
			}
			else{
				$active = 0; // on or null
			}
		}
		// Check Auth is Admin or User End
		// dd($active);
		$storeImage = $blog->image; // Old Image Store
		// dd($storeImage);
		if ($request->has('fileImage')) {
							
			$path = '/images/blogImages/';
			$image = $blog->image;
			$this->deleteImage($path, $image);
							
			$uploadedImage = $request->file('fileImage');
			$imageWithExt = $uploadedImage->getClientOriginalName();
			$imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
			$imageExt = $uploadedImage->getClientOriginalExtension();
			$storeImage = $imageName . time() . "." . $imageExt; // Image Manipulation
			$request->fileImage->move(public_path('/images/blogImages'), $storeImage);
		}
							
		$blog->title = $request->title;
		$blog->url = $request->url;
		$blog->category_id = $request->category;
		$blog->image = $storeImage;
		$blog->image_alt = $request->imageAlt;
		$blog->meta = $request->meta;
		$blog->short_description = $request->shortDescription;
		$blog->description = $request->description;
		$blog->active = $active;
							
		$blog->save();
		$blog->tags()->sync($request->tags); //Ep_22(41:18)
		// return redirect()->back()->with('success', 'Successfully');
		foreach (auth()->user()->roles as $role) {
			if($role->id == 1){
				return redirect('/dashboard');
			}
			else{
				return redirect('/user/dashboard');
			}
		}
	}
	//Validation for updating Blog
	public function updateBlogValidation($request)
	{
		if($request->has('fileImage'))
		{
			// dd("With Image");
			$request->validate([
			'title' => 'required|min:3|max:255',
			'url' => 'required|min:3|max:255|unique:blogs,url,'.$request->blog_id, //Ep_22(13:48)
			'category' => 'required',
			'tags' => 'required',
			'fileImage' => 'required|image|mimes:jpg,png,bmp,gif|max:2048',
			'imageAlt' => 'required|min:3|max:255',
			'meta' => 'required|min:3|max:255',
			'shortDescription' => 'required|min:3|max:500',
			'description' => 'required|min:11', //CKeditor field
		]);
		}else{
			// dd("No Image");
			$request->validate([
			'title' => 'required|min:3|max:255',
			'url' => 'required|min:3|max:255|unique:blogs,url,'.$request->blog_id, //Ep_22(13:48)
			'category' => 'required',
			'tags' => 'required',
			'imageAlt' => 'required|min:3|max:255',
			'meta' => 'required|min:3|max:255',
			'shortDescription' => 'required|min:3|max:500',
			'description' => 'required|min:11', //CKeditor field
			]);
							
			return $request;
		}
	}
							
	public function deleteBlog($id)
	{
		// dd($id)
		$blog = Blog::find($id);
		if($blog){
			$path = '/images/blogImages/';
			$image = $blog->image;
			$this->deleteImage($path, $image); //$this explain Ep_23(11:14)
			$blog->delete();
			return "Deleted Successfully";
		}else{
			return Response::json(['error' => 'not found'], 404);
		}
	}
							
	//Delete Image
	/*public function deleteImage($path, $image){
		// dd($path."/".$image);
		if (file_exists(public_path().$path.$image)) {
		// Illuminate\Support\Facades\Storage;
		// if (Storage::exists(public_path().$path.$image)) { // Or use above
		// Illuminate\Http\File;
		// if (File::exists(public_path().$path.$image)) { // Or use above
			unlink(public_path().$path.$image);
		}
	}*/
	// Awaiting Approval Blade Related to Admin
	public function awaitingApproval(){
		return view ('backend.awaiting');
	}
	public function approvedBlogs(){
		return view ('backend.approved');
	}
	// Get All Awaiting Approval Blogs
	public function getAwaitingApprovalBlogs(){
		
		// (1Part)
		/*$url = str_replace(url('/'), '', url()->previous());
		// dd($url);
		if($url == '/awaitingApproval'){
			$blogs = Blog::where('active', 0)->get();
		}
		else{
			$blogs = Blog::where('active', 1)->get();
		}*/
		
		
		// $category = Category::select(['id', 'name', 'created_at', 'updated_at']);
		$blogs = Blog::where('active', 0)->get(); // or below
		// $blogs = Blog::where('active', '1')->get(); //Use 1 or 0 To see only active or inactive blogs respectively
		// dd($categories);
		return Datatables::of($blogs)
		->editColumn('user_id', function ($blog) {
			return "<span class='badge badge-success badge-pill'>".$blog->user->name."</span>";
		})
		->editColumn('category_id', function ($blog) {
			return "<span class='badge badge-dark badge-pill'>".$blog->category->name."</span>";
		})
		->editColumn('title', function ($blog) {
			return strip_tags($blog->title);
		})
		/*->addColumn('id', function (Blog $blog) {
			return $blog->tags->map(function($tag) {
				return "<span class='badge badge-info badge-pill'>".$tag->name."</span>";
			// })->implode('<br>');
			})->implode('&nbsp');
		})*/
		->editColumn('short_description', function ($blog) {
			return Str::words($blog->short_description, 3, ' ...'); //Ep_24(02:49)
		})
		->editColumn('active', function ($blog) {
			return "<span class='badge badge-dark badge-pill rounded'>Awaiting Approval</span>";
			// (2Part)
			/*if ($blog->active == "1") {
			// return "<span class='badge badge-success badge-pill rounded-circle'>".$blog->active."</span>";
			return "<span class='badge badge-success badge-pill rounded'>Active</span>";
			}else{
				// return "<span class='badge badge-dark badge-pill rounded-circle'>".$blog->active."</span>";
				return "<span class='badge badge-dark badge-pill rounded'>Awaiting Approval</span>";
			}*/
		})
							
		/*->editColumn('description', function ($blog) {
			return Str::words($blog->description, 5, ' ...');
		})*/
		/*->editColumn('updated_at', function ($blog) {
			// return $blog->updated_at ? with(new Carbon($blog->updated_at))->format('Y/m/d')or('m/d/Y')or('d-M-Y') : '';;
			return $blog->updated_at ? with(new Carbon($blog->updated_at))->format('d-M-Y') : '';;
		})*/
		->rawColumns(['user_id', 'category_id', 'id', 'description', "active"])
		->make(true);
	}
							
	// Get All Awaiting Approval Blogs
	public function getApprovedBlogs(){
		$blogs = Blog::where('active', 1)->get(); // or below
		return Datatables::of($blogs)
		->editColumn('user_id', function ($blog) {
			return "<span class='badge badge-success badge-pill'>".$blog->user->name."</span>";
		})
		->editColumn('category_id', function ($blog) {
			return "<span class='badge badge-dark badge-pill'>".$blog->category->name."</span>";
		})
		->editColumn('title', function ($blog) {
			return strip_tags($blog->title);
		})
		->editColumn('short_description', function ($blog) {
			return Str::words($blog->short_description, 3, ' ...'); //Ep_24(02:49)
		})
		->editColumn('active', function ($blog) {
			return "<span class='badge badge-success badge-pill rounded'>Approved</span>";
		})
		->rawColumns(['user_id', 'category_id', 'id', 'description', "active"])
		->make(true);
	}
							
	// Approve User Blog Related to Admin
	public function approveBlog($id)
	{
		$blog = Blog::where('id', $id)->first();
		// dd($blog);
		if($blog){
			$blog->active = 1;
			$blog->save();
			return "Success from approveBlog";
		}else{
			return Response::json(['error' => 'Not Found'], 404);
		}
	}
							
	// User Awaiting Blogs View
	public function userAwaitingBlogs()
	{
		return view('userPanel.userAwaitingBlogs');
	}
	// User Related Specific Blogs (awaiting Blogs)
	public function getUserAwaitingBlogs()
	{
		// $url = request()->path();
		// $url = url()->previous();
		/*$temp = request()->session()->get('_previous');
		dd($temp['url']);*/
		/*
		$url = str_replace(url('/'), '', url()->previous());
		// dd($url);
		if($url == '/user/awaitingBlogs'){
			$user_id = auth()->id();
			$blogs = Blog::where('user_id', $user_id)->where('active', 0)->get();
		}
		else{
			$user_id = auth()->id();
			$blogs = Blog::where('user_id', $user_id)->where('active', 1)->get();
		}
		*/
		$user_id = auth()->id();
		$blogs = Blog::where('user_id', $user_id)->where('active', 0)->get();
		return Datatables::of($blogs)
		->editColumn('user_id', function ($blog) {
			return "<span class='badge badge-success badge-pill'>".$blog->user->name."</span>";
		})
		->editColumn('category_id', function ($blog) {
			return "<span class='badge badge-dark badge-pill'>".$blog->category->name."</span>";
		})
		->editColumn('title', function ($blog) {
			return strip_tags($blog->title);
		})
		/*->addColumn('id', function (Blog $blog) {
			return $blog->tags->map(function($tag) {
				return "<span class='badge badge-info badge-pill'>".$tag->name."</span>";
			// })->implode('<br>');
			})->implode('&nbsp');
		})*/
		->editColumn('short_description', function ($blog) {
			return Str::words($blog->short_description, 3, ' ...'); //Ep_24(02:49)
		})
		->editColumn('active', function ($blog) {
			if ($blog->active == "1") {
			return "<span class='badge badge-success badge-pill rounded'>Active</span>";
			}else{
				return "<span class='badge badge-dark badge-pill rounded'>Awaiting Approval</span>";
			}
		})
		->rawColumns(['user_id', 'category_id', 'id', 'description', "active"])
		->make(true);
	}
							
	// Get User Approved Blogs View
	public function getUserApprovedBlogs()
	{
		$user_id = auth()->id();
		$blogs = Blog::where('user_id', $user_id)->where('active', 1)->get();
		return Datatables::of($blogs)
		->editColumn('user_id', function ($blog) {
			return "<span class='badge badge-success badge-pill'>".$blog->user->name."</span>";
		})
		->editColumn('category_id', function ($blog) {
			return "<span class='badge badge-dark badge-pill'>".$blog->category->name."</span>";
		})
		->editColumn('title', function ($blog) {
			return strip_tags($blog->title);
		})
		/*->addColumn('id', function (Blog $blog) {
			return $blog->tags->map(function($tag) {
				return "<span class='badge badge-info badge-pill'>".$tag->name."</span>";
			// })->implode('<br>');
			})->implode('&nbsp');
		})*/
		->editColumn('short_description', function ($blog) {
			return Str::words($blog->short_description, 3, ' ...'); //Ep_24(02:49)
		})
		->editColumn('active', function ($blog) {
			if ($blog->active == "1") {
			return "<span class='badge badge-success badge-pill rounded'>Active</span>";
			}else{
				return "<span class='badge badge-dark badge-pill rounded'>Awaiting Approval</span>";
			}
		})
		->rawColumns(['user_id', 'category_id', 'id', 'description', "active"])
		->make(true);
	}
							
	// Return Edit Blog View for User Related
	public function editUserBlog($id){
		// dd($id);
		$blog = Blog::find($id); //Ep_32(15:50)
		if($blog && $blog->user_id == auth()->id()){
			$categories = Category::all();
			$tags = Tag::all();
		return view('userPanel.editBlog', compact('blog', 'categories', 'tags'));
		}else{
			return abort(404);
		}
	}
	//  User Approved Blogs
	public function userApprovedBlogs(){
		return view('userPanel.userApprovedBlogs');
	}
}