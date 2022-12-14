<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
	protected $fillable = [
		'section_name', 'about_heading', 'about_short_description', 'about_description', 'contact_heading', 'contact_short_description', 'contact_description', 'twitter', 'facebook', 'instagram',
	];
}
