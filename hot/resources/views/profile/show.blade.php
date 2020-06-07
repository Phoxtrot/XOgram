@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 col-sm-2 p-4" >
            <img src="{{$user->profile->ProfileImage()}}" style="height: 150px" class="rounded-circle">
        </div>
        <div class="col-9 col-sm-10 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h1>{{$user->username}}</h1>
                    <follow-button user-id='{{$user->id}}' follows='{{$follows}}' ></follow-button>
                </div>
                @can ("update", $user->profile)
                    <a href="/p/create"><button type="button" class="btn btn-outline-success">Add new post</button></a>
                @endcan                                
            </div>
            @can ("update", $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{$postCount}} </strong>Posts</div>
                <div class="pr-3"><strong>{{$followersCount}} </strong>followers</div>
                <div class="pr-3"><strong>{{$followingsCount}} </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold ">
                {{$user->profile->title}}                
            </div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url }}</a></div>
        </div>
        <div class="row pt-5">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-3 pl-1">
                    <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a></div>
            @endforeach   
        </div>
    </div>
</div>
@endsection
