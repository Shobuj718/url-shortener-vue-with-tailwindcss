<?php

namespace App;

use Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['original_url', 'shorten_url' , 'visits'];

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
