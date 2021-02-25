<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Url extends Model
{
    protected $fillable = ['original_url', 'shorten_url'];

    protected static function boot()
    {
    	parent::boot();
    	static::creating(function($url){
    		$url->shorten_url = Str::random();
    	});
    }
    public function getRouteKeyName()
	{
	    return 'shorten_url';
	}
}
