<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public const TYPE='service';

    protected $table='posts';

	protected $fillable=['title','body','image','type','published_at','user_id'];

	protected $casts=['published_at'=>'datetime'];

	protected $appends=[
		'meta_excerpt',
	];

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

	public function getMetaExcerptAttribute(){
		$meta_excerpt=$this->metas()->where('name','=','meta_excerpt')->first(['value']);
		return $meta_excerpt ? $meta_excerpt->value : null;
	}

	public function seo(){
		return $this->morphOne('App\Models\Seo','seoble');
	}

	public function orders(){
		return $this->hasMany('App\Models\Order','post_id');
	}

}
