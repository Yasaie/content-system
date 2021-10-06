<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';

    protected $fillable=['name'];

	public function blogs(){
		return $this->belongsToMany('App\Models\Blog','post_tag','post_id','tag_id')
					->where('posts.type',Blog::TYPE)
					->withTimestamps();
	}
}
