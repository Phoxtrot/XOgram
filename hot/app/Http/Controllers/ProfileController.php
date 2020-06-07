<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
class ProfileController extends Controller
{
    public function show(User $user)
    {
    	$follows =(auth()->user())? auth()->user()->following->contains($user->id): false;  
        $postCount = Cache::remember('count.posts'. $user->id,
                now()->addSeconds(30),
                function() use($user){
                return $user->posts->count();
                }); 
        $followersCount = Cache::remember('count.follower'. $user->id,
                now()->addSeconds(30),
                function() use($user){
                return $user->profile->follower->count();
                }); 
        $followingsCount = Cache::remember('count.following'. $user->id,
                now()->addSeconds(30),
                function() use($user){
                
                return $user->following->count();
                });      
    	return view('profile.show',compact('user','follows','postCount','followersCount','followingsCount'));

    }

    public function edit(User $user)
    {
       $this->authorize('update', $user->profile);
       return view('profile.edit', compact('user'));
    }
    public function update(user $user)
    {
        $this->authorize('update', $user->profile);        
        $data = Request ()-> validate([
            'username'=> 'required',
            'title'=> 'required',
            'description' => 'required',
            'image' => '',
            'url' => '' 
        ]);
        
        if (request('image')) {
            $imagepath = Request('image')->store('profile', 'public');
            $image = Image::make(public_path('storage/'.$imagepath))->fit(1000,1000);
            $image->save();
            $imagearr = ['image'=>$imagepath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imagearr ?? []
        ));
        auth()->user()->update($data);

        return redirect ('profile/'.auth()->user()->id);
    }
}
