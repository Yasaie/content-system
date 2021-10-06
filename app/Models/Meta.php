<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table='metas';

	protected $fillable=['name','value'];

	public function metable(){
		return $this->morphTo();
	}
}
