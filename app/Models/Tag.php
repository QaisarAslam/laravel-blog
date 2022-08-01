<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
		'name', 'slug',
	];
	// protected $primaryKey = 'id2';
	public function blogs(){
		return $this->belongsToMany(Blog::class);
	}
}
