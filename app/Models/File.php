<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class File extends Model
{
    protected $table = 'files';

    protected $appends = [
        'url',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'disk',
        'file_name',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getUrlAttribute()
    {
        return fileUploadUrl($this->name);
    }
}
