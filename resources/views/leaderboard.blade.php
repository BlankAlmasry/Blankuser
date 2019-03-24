@extends('layouts.master')
@section('header')
    <title>Leaderboard - BlankUser</title>
    <meta name="description" content="top 50 Article writers">
    <meta name="keywords" content="leaderboard,blog,scientific,blankuser,writers,author">
@endsection


@section('grid-header')
    <div class="Web-body mt-4 pt-3">
        <div class="container">
            <div class="row">
                @endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('body')
<div class="col-12 col-md-9 col-lg-10 leaderboard  pl-2 mt-4 PageBody">
    <div class="bg-white">
        <div class="leaderboardrank">
            <div class="py-1 px-3" style="background-color: black ">
                <img src="img/blanksquare.jpg"width="50px" height="50px" class="">
                <h3 class="text-white d-inline position-relative " style="top: 8px;">Leaderboard</h3>
            </div>

        @foreach($users as $user)
            <div  style="cursor: pointer" onclick="window.location.href='user?name={{$user->name}}'">
            <div class="pl-4 py-2 border-bottom" >
                <div class=" d-inline-block" >
                    <span class="h5 d-inline">{{$i+=1}}</span>
                    <img src="{{$user->avatar}}" height="70px" width="70px" class="rounded-circle user-img">
                </div>

                <div class=" d-inline-block " style="position: relative;top:12px">
                    <p class=" h3 mb-0 pb-0 d-block">{{$user->name}}</p>
                </div>
                <div class="float-right h5 text-muted font-weight-normal mt-4 mr-4 pt-1 ">{{$user->points}} POINT</div>

            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>









@endsection
@section('grid-footer')
            </div>
        </div>
    </div>
@endsection
