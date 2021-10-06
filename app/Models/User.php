<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function metas(){
		return $this->morphMany('App\Models\Meta','metable');
	}

	public function blogs(){
		return $this->hasMany('App\Models\Blog','user_id');
	}

	public function pages(){
		return $this->hasMany('App\Models\Page','user_id');
	}

	public function teams(){
		return $this->hasMany('App\Models\Team','user_id');
	}

	public function works(){
		return $this->hasMany('App\Models\Work','user_id');
	}

	public function Services(){
		return $this->hasMany('App\Models\Service','user_id');
	}

}
