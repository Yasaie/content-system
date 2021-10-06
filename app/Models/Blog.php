<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	public const TYPE='blog';

    protected $table='posts';

	protected $fillable=['title','body','image','type','published_at','user_id'];

	protected $casts=['published_at'=>'datetime'];

	public static function boot()
	{
		parent::boot();

		static::addGlobalScope('type',function(Builder $builder){
			$builder->where('type', '=', self::TYPE)
					->orderByDesc('posts.created_at');
		});
	}

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

	public function tags(){
		return $this->belongsToMany('App\Models\Tag','post_tag','post_id','tag_id')
					->withTimestamps();
	}

	public function metas(){
		return $this->morphMany('App\Models\Meta','metable');
	}

	public function seo(){
		return $this->morphOne('App\Models\Seo','seoble');
	}

	public function categories(){
		return $this->morphToMany('App\Models\Category', 'nestable','nestedables','nestable_id','nested_id');
	}

	public function comments(){
		return $this->morphMany('App\Models\Comment','commentable');
	}

}
