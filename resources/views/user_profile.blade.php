@extends('layouts.master')
@section('header')
    <title>{{$user->name}} - BlankUser</title>
    <meta name="description" content="{{$user->about}}">
    <meta name="keywords" content="{{$user->school}},{{$user->name}},{{$user->job}},{{$user->points}}">
    <link rel="stylesheet" href="css/profile.css">
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
                @include('layouts.flash-session')
                <!-- profile -->

                    <div class="text-center text-md-center col-11 col-md-8 col-lg-9 mt-4 bg-white pt-3 pl-lg-5 pl-sm-2 pl-md-4 mx-4 profile PageBody">
                        <div class="picandabout d-block d-lg-flex">
                            <div class=" profile-img-carrier d-inline-block mt-4 m-0 p-0" >
                                <img src="{{$user->avatar}}" alt="" class="align-self-center ">
                                <p class="text-center bg-dark "><span style="font-size:20px;font-weight:bold ;font-family: monospace">{{$user->points}}</span><span style="font-size: 14px; padding-left:5px;">POINT</span></p>
                            </div>
                            <div class="information mt-3 pl-3 pr-5 w-100">
                                <h1 class="h2 pt-1 pb-0 pt-0 my-0">{{$user->name}}</h1>
                                <p class="small pb-3 text-muted">#{{$user->id}}</p>
                                <h6 class="h6 text-muted">{{$user->job}}</h6>
                                <p class="text-muted pt-3 ">{{$user->about}}</p>
                            </div>

                        </div>
                        <div class="row mt-4 text-muted pl-lg-5 pl-sm-1 pl-md-3 text-center text-md-left">
                            <div class="col-6 ">
                                <div class="five-information">
                                    <p><i class="fa fa-briefcase"></i>&nbsp;{{$user->job}}</p>
                                    <p><i class="fa fa-graduation-cap"></i>{{$user->school}}</p>
                                    <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{$user->country}}</p>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="three-information">
                                    <p><i class="fa fa-clock-o"></i>&nbsp;{{\Carbon\Carbon::parse($user->last_log_at)->diffForHumans()}}</p>
                                    <p><i class="fa fa-history"></i>&nbsp;{{$user->created_at->diffForHumans()}} </p>
                                    <p><i class="fa fa-pencil pr-0"></i>{{$user->articles->count()}} Article</p>

                                </div>
                            </div>
                        </div>

                        <div class="{{($user->articles->count() == 0)?'d-none':''}}">

                        <p class="text-muted text-center border-bottom mt-5 py-3 top-articles mb-4" >Top Articles</p>
                        @foreach($user->articles as $article)
                            <div class="top-article  my-5 " onclick="window.location.href='{{str_replace(' ','-',$article->title)}}'" style="cursor:pointer;">
                                <button class="btn  d-inline small  p-1 rounded text-white border points" style="width: 35px;height: 35px;">{{$article->points}}</button>
                                <p class="d-inline h4 text-left">{{$article->title}}</p>
                                <span class="text-muted small">{{$article->created_at->diffForHumans()}}</span>
                            </div>
                        @endforeach
                        <br><hr>
                        </div></div>
                    <!-- profile -->



                @endsection
                @section('grid-footer')
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="js/profile.js"></script>
@endsection
