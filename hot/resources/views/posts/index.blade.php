@extends('layouts.app')
@section('navbar')
    
@endsection()
@section('content')
<div class="container">
    @foreach ($post as $post)
        <div class="row">
            <div class="col-6 offset-3">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-6 offset-3">
                <p>
                    <span class="font-weight-bold">                 
                        <p class="text-dark"> <a href="/profile/{{$post->user->id}}"> <span class="text-dark font-weight-bold" >{{$post->user->username }}</span></a> {{$post->caption}}</p>
                        </a>
                    </span>
                </p>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12">
           
        </div>
    </div>
</div>
@endsection
