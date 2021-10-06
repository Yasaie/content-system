<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table='contact_us';

    protected $fillable=['subject','name','email','phone','content','read_at'];

	protected $casts=[
		'read_at'=>'datetime',
	];

	public function readed(){
		return $this->read_at!==null;
	}

	public function unReaded(){
		return $this->read_at===null;
	}

	public function markAsReaded(){
		$this->forceFill(['read_at'=>Carbon::now()])->save();
		return $this;
	}

	public function markAsUnReaded(){
		$this->forceFill(['read_at'=>null])->save();
		return $this;
	}
}
