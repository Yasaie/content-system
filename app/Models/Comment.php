<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    protected $fillable=['name','email','website','comment','parent_id','published_at'];

	protected $casts=[
		'parent_id'=>'integer',
		'published_at'=>'datetime',
	];

	public function published(){
		return $this->published_at!==null;
	}

	public function notPublished(){
		return $this->published_at===null;
	}

	public function markAsPublished(){
		$this->forceFill(['published_at'=>Carbon::now()])->save();
		return $this;
	}

	public function markAsNotPublished(){
		$this->forceFill(['published_at'=>null])->save();
		return $this;
	}

	public function isChild(){
		return $this->parent_id===null;
	}

	public function children(){
		return $this->hasMany('App\Models\Comment','parent_id','id');
	}

	public function parent(){
		return $this->belongsTo('App\Models\Comment','parent_id','id');
	}

	public function commentable(){
		return $this->morphTo();
	}


}
