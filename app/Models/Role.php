<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [ //Ep_28(04:28) Pivot table many to many relationship
		'name',
	];
	//Ep_28(08:28) Create pivot relationship
	//Users Role
	public function users()
	{
		//Ep_29(11:07) Now test this relationship
		return $this->belongsToMany(User::class);
	}
}
