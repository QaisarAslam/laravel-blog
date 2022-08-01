<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use DB;

class TagController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		return view ('backend.tags');
	}

	public function getAllTags()
	{
		// $category = Category::select(['id', 'name', 'created_at', 'updated_at']);
		$tags = Tag::all();
		// dd($categories);
		return Datatables::of($tags)
		->editColumn('created_at', function ($tag) {
			// return $tag->created_at ? with(new Carbon($tag->created_at))->format('d-M-Y') : '';
			return $tag->created_at ? with(new Carbon($tag->created_at))->format('d-M-Y') : '';
			// return $category->created_at ? with(new Carbon($category->created_at))->format('m/d/Y') : '';
		})
		->editColumn('updated_at', function ($tag) {
			// return $tag->updated_at ? with(new Carbon($tag->updated_at))->format('Y/m/d') : '';;
			return $tag->updated_at ? with(new Carbon($tag->updated_at))->format('d-M-Y') : '';;
		})
		->make(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		// dd($request);
		$request->validate([
			'tagName' => 'required|min:3|max:255',
		]);
		// return($request->all());

		$slug = Str::slug($request->tagName);
		$tag = Tag::create([
			'name' => $request->tagName,
			'slug' => $slug,
		]);
		return "Create Success";
		// dd($request->all());
		// dd($slug);
	}


	public function getTag($id)
	{
		//
		$tag = Tag::find($id);
		if ($tag) {
			return $tag;
		}
		else{
			return Response::json(['error' => 'Not Found'], 404);
		}
		// dd($category);
	}

	public function updateTag(Request $request, Tag $tag)
	{
		// dd($request->all());
		$request->validate([
			'editTag' => 'required|min:3|max:255',
		],[
			'editTag.required' => 'The Tag field is required.',
			'editTag.min' => 'The Tag name should be min 3 characters.',
			'editTag.max' => 'The Tag name may not be greater than 255 characters.',
		]);

		$tag = Tag::find($request->editTagId);

		$tag->name = $request->editTag;
		$tag->slug = Str::slug($request->editTag);
		$tag->save();

		return "Update Success";
	}

	public function deleteTag($id)
	{
		// dd($id)
		$tag = Tag::find($id);
		if($tag){
			$tag->delete();
			return "Delete Success";
		}else{
			return Response::json(['error' => 'not found'], 404);
		}
	}
	public function delete()
    {
        DB::table('tags')->truncate();
    }
}
