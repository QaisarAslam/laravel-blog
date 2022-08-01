<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Cms;
use App\Models\Role;
use App\Models\Tag;
use App\Traits\MyTrait;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Response;
use App\Models\Message;

class BackendController extends Controller
{
	use MyTrait;
    //Ep_26(04:43)
    // Admin Dashboard
    public function dashboard(){
    	$catCount = Category::count(); //Ep_33(04:00)
    	$tagCount = Tag::count();
    	$userCount = User::count();
    	$blogCount = Blog::count();
    	$pubBlogCount = Blog::where('active', 1)->count();
    	$awaitBlogCount = Blog::where('active', 0)->count();
    	
    	// $blog = ($awaitBlogCount*100/$blogCount).'%';
    	// dd($blog);
    	return view('backend.dashboard', compact('catCount', 'tagCount', 'userCount', 'blogCount', 'pubBlogCount', 'awaitBlogCount'));
    }
    // Return all users of Blogging System View
    public function allUsersView(){
    	return view('backend.allUsers');
    }
    // Return all users of blogging system
    public function getAllUsers()
	{
		$allUsers = Role::where('id', 2)->first()->users()->get();
		return Datatables::of($allUsers)
		->editColumn('created_at', function ($user) {
			return $user->created_at ? with(new Carbon($user->created_at))->format('d-M-Y') : '';
		})
		->editColumn('updated_at', function ($user) {
			return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';
		})
		->make(true);
	}
	// Delete Specific User and their Related record
	public function deleteUser($id){
		// dd($id);
		$user = User::findOrFail($id);
		// dd($user->blogs);
		if($user){
			$path = '/images/blogImages/';
			foreach ($user->blogs as $blog) {
				$image = $blog->image;
				$this->deleteImage($path, $image);
			}
			// dd('Stop');
			$user->delete();
			return('Success');
		}else{
			return Response::json(['error'=>'not Found'],404);
		}
	}
    // CMS View / Blade
    public function cms(){
    	// about section data get Ep_36(22:15)
    	$about_section = Cms::where('section_name', 'about_section')->first();
    	$contact_section = Cms::where('section_name', 'contact_section')->first();
    	$footer = Cms::where('section_name', 'footer_section')->first();
    	// dd($footer);
    	return view('backend.cms', compact('about_section', 'contact_section', 'footer'));
    }
    // Create Or Update About Section
    public function createOrUpdateAbout(Request $request){
    	// dd($request->all()); // Ep_36(14:00)
		$request->validate([
			'about_heading' => 'required|min:4|max:255',
			'about_short_description' => 'required|min:4|max:255',
			'about_description' => 'required|min:4',
		]);
    	if(empty($request->about_section_name)){
    		$about = Cms::create([
    		'section_name' => 'about_section', // Section Hard Coded Meaning Will Manual Create Ep_36(18:00)
    		'about_heading' => $request->about_heading,
    		'about_short_description' => $request->about_short_description,
    		'about_description' => $request->about_description,
    		]);
    	
    		$msg = 'Created';
    		return compact('msg', 'about');
    	
    	}else{
    		// Ep_36(30:35) Get and Edit
    		$about = Cms::where('section_name', 'about_section')->first();
    		$about->about_heading = $request->about_heading;
    		$about->about_short_description = $request->about_short_description;
    		$about->about_description = $request->about_description;
    		$about->save();
    		
    		$msg = 'Updated';
    		return compact('msg', 'about');
    	}
    	// dd('done');
    }
    // Create or Update Contact Section
	public function createOrUpdateContact(Request $request){
		// dd($request->all()); // Ep_36(14:00)
		$request->validate([
		'contact_heading' => 'required|min:4|max:255',
		'contact_short_description' => 'required|min:4|max:255',
		'contact_description' => 'required|min:4|max:255',
		]);
		if(empty($request->contact_section_name)){
			$contact = Cms::create([
			'section_name' => 'contact_section', // Section Hard Coded Meaning Will Manual Create Ep_36(18:00)
			'contact_heading' => $request->contact_heading,
			'contact_short_description' => $request->contact_short_description,
			'contact_description' => $request->contact_description,
		]);

		$msg = 'Created';
		return compact('msg', 'contact');

		}else{
			// Ep_36(30:35) Get and Edit
			$contact = Cms::where('section_name', 'contact_section')->first();
			$contact->contact_heading = $request->contact_heading;
			$contact->contact_short_description = $request->contact_short_description;
			$contact->contact_description = $request->contact_description;
			$contact->save();

			$msg = 'Updated';
			return compact('msg', 'contact');
			}
			// dd('done');
	}
	// Create or Update Footer Section
	public function createOrUpdateFooter(Request $request){
    	// dd($request->all()); // Ep_36(14:00)
		$request->validate([
			'facebook' => 'required|min:4|max:255',
			'twitter' => 'required|min:4|max:255',
			'instagram' => 'required|min:4|max:255',
		]);
    	if(empty($request->footer_section)){
    		$footer = Cms::create([
    		'section_name' => 'footer_section', // Section Hard Coded Meaning Will Manual Create Ep_36(18:00)
    		'facebook' => $request->facebook,
    		'instagram' => $request->instagram,
    		'twitter' => $request->twitter,
    		]);
    	
    		$msg = 'Created';
    		return compact('msg', 'footer');
    	
    	}else{
    		// Ep_36(30:35) Get and Edit
    		$footer = Cms::where('section_name', 'footer_section')->first();
    		$footer->facebook = $request->facebook;
    		$footer->instagram = $request->instagram;
    		$footer->twitter = $request->twitter;
    		$footer->save();
    		
    		$msg = 'Updated';
    		return compact('msg', 'footer');
    	}
    	// dd('done');
    }
    // User Dashboard
    public function userDashboard(){
    	$user_id = auth()->id();
    	$awaitBlogCount = Blog::where('user_id', $user_id)->where('active', 0)->count();
    	$pubBlogCount = Blog::where('user_id', $user_id)->where('active', 1)->count();
    	$blogCount = Blog::where('user_id', $user_id)->count();
    	// dd($catcount);
    	return view('userPanel.dashboard', compact('blogCount', 'pubBlogCount', 'awaitBlogCount'));
    }
    	
    public function createBlogView(){
    	$categories = Category::all();
    	$tags = Tag::all();
        return view('userPanel.createBlog', compact('categories', 'tags')); //or
        // return view('backend.createBlog', (['categories'=>$categories, 'tags'=>$tags])); //or
        // return view('backend.createBlog', (array('categories'=>$categories, 'tags'=>$tags)));
    }
    // Return Contact Message's View
    public function contactMessages(){
    	return view('backend.msg');
    }
    // Return All Contact Message's
    public function getAllMsg(){
    	$msgs = Message::all();
    	return Datatables::of($msgs)
    	->editColumn('created_at', function ($msg) {
			// return $msg->updated_at ? with(new Carbon($msg->updated_at))->format('Y/m/d')or('m/d/Y')or('d-M-Y') : '';;
    		return $msg->created_at ? with(new Carbon($msg->created_at))->format('d-M-Y') : '';
    	})
    	->make(true);
    }
    // Get specific contact message
    public function getMsg($id){
    	// dd('here');
    	$msg = Message::findOrFail($id);
    	if($msg){
    		return $msg;
    	}else{
    		return Response::json(['error' => 'Message not found'], 404);
    	}
    }
    // Delete specific contact message
    public function deleteMsg($id){
    	// dd('here');
    	$msg = Message::findOrFail($id);
    	if($msg){
    		$msg->delete();
    		return "Successfully Deleted";
    	}else{
    		return Response::json(['error' => 'Message not found'], 404);
    	}
    }

    public function create(Request $request){
    	// dd($request->all());

    	// dd($request->all());
    	foreach (auth()->user()->roles as $role) {
			if($role->id == 1){
				$active = $request->active == 'on' ? 1 : 0; // on or null
			}
			else{
				$active = 0; // on or null
			}
		}
    	// dd($user->id);
    	// dd($request->all());
    	// $active = $request->active == 'on' ? 1 : 0; //Ternary Operation Ep_19(10:18)
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
    	return redirect()->back()->with('success', 'Successful.'); //with create session for a short time.
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
}
