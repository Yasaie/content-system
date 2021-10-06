<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';

    protected $fillable=['name','phone','idea','image','published_at','show_in_main_page_at'];

	protected $appends=[
		'meta_job',
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

	public function showInMainPage(){
		return $this->show_in_main_page_at!==null;
	}

	public function notShowInMainPage(){
		return $this->show_in_main_page_at===null;
	}

	public function metas(){
		return $this->morphMany('App\Models\Meta','metable');
	}

	public function getMetaJobAttribute(){
		$meta_job=$this->metas()->where('name','=','meta_job')->first(['value']);
		return $meta_job ? $meta_job->value : null;
	}

}
