<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public const TYPE='team';

    protected $table='posts';

	protected $fillable=['title','body','image','type','published_at','user_id'];

	protected $casts=['published_at'=>'datetime'];

    protected $appends=[
        'meta_mainshow',
        'meta_job',
    ];

	public static function boot()
	{
		parent::boot();

		static::addGlobalScope('type',function(Builder $builder){
			$builder->where('type', '=', self::TYPE)
					->orderByDesc('posts.created_at');
		});
	}

	public function published()
    {
		return $this->published_at!==null;
	}

	public function notPublished()
    {
		return $this->published_at===null;
	}

	public function markAsPublished()
    {
		$this->forceFill(['published_at'=>Carbon::now()])->save();
		return $this;
	}

	public function markAsNotPublished()
    {
		$this->forceFill(['published_at'=>null])->save();
		return $this;
	}

	public function metas()
    {
		return $this->morphMany('App\Models\Meta','metable');
	}

	public function seo()
    {
		return $this->morphOne('App\Models\Seo','seoble');
	}

    public function showInMainPage()
    {
        return $this->meta_mainshow!==null;
    }

    public function notShowInMainPage()
    {
        return $this->meta_mainshow===null;
    }

    public function getMetaMainshowAttribute()
    {
        $meta_mainshow=$this->metas()->where('name','=','meta_mainshow')->first(['value']);
        return $meta_mainshow ? $meta_mainshow->value : null;
    }

    public function getMetaJobAttribute()
    {
        $meta_job=$this->metas()->where('name','=','meta_job')->first(['value']);
        return $meta_job? $meta_job->value : null;
    }
}
