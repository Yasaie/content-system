<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table='slides';

    protected $fillable=['title','body','url','color','image','published_at'];

    protected $casts=[
    	'published_at' => 'datetime',
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
}
