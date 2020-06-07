<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title', 'description','image', 'url',
    ];

    public function ProfileImage()
    {
    	$imagepath = ($this->image)? $this->image : 'profile/fSDFWER0NMm0k2WPTU3LF3ayWKKbgAb52DqI1FDo.jpeg';
    	return  '/storage/'.$imagepath;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function follower()
    {
    	return $this->belongsToMany(User::class);
    }
}
