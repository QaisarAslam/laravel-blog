<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
	public function index()
	{
		//
		return view ('backend.category');
	}

	public function GetAllCategories()
	{
		// $category = Category::select(['id', 'name', 'created_at', 'updated_at']);
		$categories = Category::all();
		// dd($categories);
		return Datatables::of($categories)
		->editColumn('created_at', function ($category) {
			return $category->created_at ? with(new Carbon($category->created_at))->format('d-M-Y') : '';
			// return $category->created_at ? with(new Carbon($category->created_at))->format('m/d/Y') : '';
		})
		->editColumn('updated_at', function ($category) {
			return $category->updated_at ? with(new Carbon($category->updated_at))->format('Y/m/d') : '';
		})
		->make(true);
	}

	public function create(Request $request)
	{
		$request->validate([
			'category_name' => 'required|min:3|max:15',
		]);

		$slug = Str::slug($request->category_name);
		$category = Category::create([
			'name' => $request->category_name,
			'slug' => $slug,
		]);
		return "Success";
		// dd($request->all());
		// dd($slug);
	}

	public function getCategory($id)
	{
		//
		$category = Category::find($id);
		if ($category) {
			return $category;
		}
		else{
			return Response::json(['error' => 'Not Found'], 404);
		}
		// dd($category);
	}

	public function updateCategory(Request $request, Category $category)
	{
		// dd($request->all());
		$request->validate([
			'edit_category' => 'required|min:3|max:255',
		],[
			'edit_category.required' => 'The category field is required.',
			'edit_category.min' => 'The category name should be min 3 characters.',
			'edit_category.max' => 'The category name may not be greater than 255 characters.',
		]);

		$category = Category::find($request->edit_category_id);

		$category->name = $request->edit_category;
		// $category->slug = Str::slug($request->edit_category);
		$category->save();

		return "Success";
	}

	public function deleteCategory($id)
	{
		// dd($id)
		$category = Category::find($id);
		if($category){
			$category->delete();
			return "Success";
		}else{
			return Response::json(['error' => 'not found'], 404);
		}
	}

	public function delete()
    {
        // DB::table('categories')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	// DB::table('datapoints')->truncate();
    	DB::table('categories')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    	return "<h3 style='color:red; margin: 0; position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); left: 50%; -ms-transform: translateX(-50%); transform: translateX(-50%);'>Categories Table has been truncated Successfully!</h6>";
    }
    public function deleteAll()
    {
		// To Drop All Tables From Database
		DB::statement("SET foreign_key_checks=0");
		$databaseName = DB::getDatabaseName();
		$tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
		foreach ($tables as $table) {
			$name = $table->TABLE_NAME;
    	//if you don't want to truncate migrations
			if ($name == 'migrations') {
				continue;
			}
			DB::table($name)->truncate();
			DB::table('migrations')->truncate();
		}
		DB::statement("SET foreign_key_checks=1");
		return "<h3 style='color:red; margin: 0; position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); left: 50%; -ms-transform: translateX(-50%); transform: translateX(-50%);'>All Tables have been truncated including migrations Successfully!</h6>";
	}
}
