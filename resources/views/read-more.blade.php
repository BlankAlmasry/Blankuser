@extends('layouts.master')
@section('header')
    <title>{{$post->first()->title}} - BlankUser</title>
    <meta name="description" content="{{str_limit(trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9]/', ' ',urldecode(html_entity_decode(strip_tags($post->first()->body)))))),120)  }}">
    <meta name="keywords" content="@foreach($post->first()->tags as $tag){{$tag->name}},@endforeach">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/post.css">
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
    <!--post .. read more -->
        @foreach ($post as $article)
        <div class="col-12 col-md-9 col-lg-7 PageBody">
            <div class="bg-white post-more px-4 text-dark">
                <div class="post-stuff">
                <div class="row mt-4">
                    <div class="col-11 px-0 mx-0">
                        <h1 class="article-title h2 font-weight-bold pl-xl-3 text-center mt-4  px-0 mx-0">
                                {{ $article->title }}
                            </h1>
                    </div>
                    <div class="col-1 px-0 mx-0">
                        <div class="  d-inline-block ">
                            <div class="vote-system mt-4 ml-3" @if(auth()->guest())onclick="window.location.href='/login '"@endif>
                                <span class="upvote @if(auth()->user()&&App\Vote::where('user_id','=',auth()->user()->id)->where('article_id','=',$article->id)->where('points','=','1')->first()!=null){{'active'}}@endif"></span>
                                <p class="votes">{{$article->points}}</p>
                                <span class="downvote @if(auth()->user()&&App\Vote::where('user_id','=',auth()->user()->id)->where('article_id','=',$article->id)->where('points','=','-1')->first()!=null){{'active'}} @endif"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="images/{{$article->img}}" class="mt-2 pb-3 post-img">
               {!! $article->body!!}

                <hr class="px-4">
                <div class="maker d-block text-center align-content-center">
                    <h2 class="d-inline-block p-0 m-0" style="position: relative; top: -10px; left: 3px">Author </h2>
                    <br>
                    <img  src="{{$article->user->avatar}}" class=" acc-icon d-inline my-0 mb-0 "  height="60px" style="cursor: pointer;" onclick="window.location.href='user?name={{$article->user->name}}'">
                    <br>                <div style="display: inline-block!important;" class="mt-0 ml-auto">
                        <p class="d-inline text-muted " style="cursor: pointer;" onclick="window.location.href='user?name={{$article->user->name}}'">{{$article->user->name}}</p><br>
                        <p class="small d-inline text-muted">{{$article->user->about}}</p>
                    </div>
                </div>
                <hr class="px-4">
            </div>
               

                <br>
@include('layouts.comments')

                </div>
            </div>
        @endforeach
    <!--post .. read more -->
@endsection

    @section('sections')
        @include('layouts.sections')
    @endsection
@section('grid-footer')
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="js/post.js"></script>

    <script>
        $('.upvote').on('click',function(){
            if ($(this).hasClass('active')){
                $(this).removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) -1 ;
                $('.votes').html(votes);
            }else if($('.downvote').hasClass('active')) {
                $(this).addClass('active');
                $('.downvote').removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) +2 ;
                $('.votes').html(votes);
            }
            else{
                $(this).addClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) +1;
                $('.votes').html(votes);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/'.str_replace('?','',$article->title).'/vote' )}}",
                type: 'POST',
                data: {
                    points :1
                }

        })});
        $('.downvote').on('click',function(){
            if ($(this).hasClass('active')){
                $(this).removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) +1 ;
                $('.votes').html(votes);
            }else if($('.upvote').hasClass('active')) {
                $(this).addClass('active');
                $('.upvote').removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) -2 ;
                $('.votes').html(votes);
            }
            else{
                $(this).addClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) -1 ;
                $('.votes').html(votes);
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/'.str_replace('?','',$article->title).'/vote' )}}",
                type: 'POST',
                data: {
                    points:0
                 }

            })});

    </script>

@endsection
