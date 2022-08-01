<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cms;
use Auth;
use Illuminate\Http\Request;
use App\Models\Message;

class FrontendController extends Controller
{
	//Home Page
	public function index(){
		$blogs = Blog::all();
		// dd($blogs);
		// $blogs = Blog::where('active', 1)->get(); //Get only published blogs not unpublished Ep_24(09:00) use get() method to get all records not first() method
		// $blogs = Blog::where('active', 1)->paginate(3);
		$blogs = Blog::where('active', 1)->orderby('id', 'desc')->paginate(3); //Ep_25(19:28)
		// $blogs = Blog::where('active', 1)->orderby('id', 'desc')->simplePaginate(2); //Ep_25(19:28)
		// dd($blogs);
		$footer = Cms::where('section_name', 'footer_section')->first();
		return view('frontend.blog', compact('blogs', 'footer'));
	}
	//Blog Details Page
	public function blogDetails($url){
		// dd('here');
		$blog = Blog::where('url', $url)->first(); //Ep_25(05:22)
		// dd($blog->url);
		return view('frontend.blog_detail', compact('blog'));
	}
	public function aboutUs(){
		$about = Cms::where('section_name', 'about_section')->first();
		$footer = Cms::where('section_name', 'footer_section')->first();
		return view('frontend.about', compact('about', 'footer'));
	}
	public function contactUs(){
		$contact = Cms::where('section_name', 'contact_section')->first();
		$footer = Cms::where('section_name', 'footer_section')->first();
		return view('frontend.contact', compact('contact', 'footer'));
	}
	public function createContactMessage(Request $request){
		// dd($request->all());
		$request->validate([
			'name' => 'required|min:3|max:30',
			'email' => 'required|email',
			'message' => 'required|min:3',
		]);
		$message = Message::create([
			'name' => $request->name,
			'email' => $request->email,
			'message' => $request->message,
		]);
		return 'Success';
	}
}
