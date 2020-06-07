@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-4" >
            <img src="/img/me.jpg" style="height: 150px" class="rounded-circle">
        </div>
        <div class="col-9 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                <a href="#"><button type="button" class="btn btn-outline-success">Add new post></button></a>
            </div>
            <div class="d-flex">
                <div class="pr-3"><strong>153 </strong>Posts</div>
                <div class="pr-3"><strong>23 </strong>followers</div>
                <div class="pr-3"><strong>145 </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold ">
                {{$user->profile->title}}                
            </div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url }}</a></div>
        </div>
        <div class="row pt-5">
            <div class="col-4"><img src="/img/header.jpeg"class="w-100 h-50"></div>
            <div class="col-4"><img src="/img/sess.jpg"class="w-100"></div>
            <div class="col-4"><img src="/img/sess.jpg"class="w-100"></div>
        </div>
    </div>
</div>
@endsection
