<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $fillable = [
		'user_id', 'category_id', 'title', 'url', 'image', 'image_alt', 'meta', 'short_description', 'description', 'active',
	];
	// Blogs belongsTo user Inverse Site
	public function user()
	{
		/*$this 18Ep_14:00*/
		return $this->belongsTo(User::class);
	}
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
}
