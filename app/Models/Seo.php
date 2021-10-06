<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
	protected $table='seo';

	protected $fillable=['title','description','keywords','canonical'];

	public function seoble(){
		return $this->morphTo();
	}

}
