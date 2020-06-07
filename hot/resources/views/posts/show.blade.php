@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
            	<div class="pr-3">
            		<img src="{{$post->user->profile->ProfileImage()}}" class="w-100 rounded-circle" style="max-width: 40px">
            	</div>
            	<div class="d-flex">
            		<div class="font-weight-bold">
            			<a href="/profile/{{$post->user->id}}">
            				<div class="text-dark">{{$post->user->username}}</div>
            			</a>
            			<a href="#" class="">Follow</a>
            		</div>
            	</div>
            </div>
            <hr>
            <p>
            	<span class="font-weight-bold">            		
            			<p class="text-dark"> <a href="/profile/{{$post->user->id}}"> <span class="text-dark font-weight-bold" >{{$post->user->username }}</span></a> {{$post->caption}}</p>
            		</a>
            	</span>
            </p>
        </div>
    </div>
</div>
@endsection
