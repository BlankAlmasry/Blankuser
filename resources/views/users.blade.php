@extends('layouts.master')
@section('header')
    <title>Find User - BlankUser.com</title>
    <meta name="description" content="Find User">
    <meta name="keywords" content="find user,user,users,blankuser,friend">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                    <div class="col-12 col-md-9 col-lg-10 PageBody">
                            <div class="pl- 0 pl-sm-3 mt-4" style="background: #fff;">
                                <div class="container">
                                <h1 class="text-center mb-3">Users</h1>
                                <form class="mb-5 mt-4" method="post" action="users">
                                    @csrf
                                    <div class="form-group text-center">
                                        <label for="username col-lg-3 col-md-3 col-4">Find User :</label>
                                        <input type="text" placeholder="Username" name="username" id="username" class="col-lg-8 col-md-7 col-5 form-control d-inline">
                                        <button id="searchuserbtn" class="btn btn-primary col-md-2 col-3 col-lg-1 mb-2">Find</button>
                                    </div>
                                </form>
                                    <div class="text-center h6 text-muted nouserfound"></div>

                                    <div class="row users-found">
                                        @foreach($users as $user)
                                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4" onclick="window.location.href ='user?name={{$user->name}}'">
                                            <img src="{{$user->avatar}}" class="w-25 border">
                                            <div class="w-75 float-right text-muted pl-1">
                                                <p class="p-0 m-0 small text-dark">{{$user->name}}</p>
                                                <p class="p-0 m-0 small">{{$user->points}}</p>
                                                <p class="small p-0 m-0"><i class="fa fa-map-marker"></i> {{$user->country}}</p>
                                            </div>
                                        </div>
                                        @endforeach




                                    </div>
                                 </div>
                            </div>
                    </div>











@endsection
@section('grid-footer')
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('#username').on('keyup',function(){
          $value =$(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/users') }}",
                type: 'POST',
                data: {
                    username :jQuery('input[name="username"]').val() ,
                },
                success: function(data){
                    $('.users-found').empty();
                    if (data == "No user found")
                    {
                        $('.nouserfound').html("No user found");

                    }else {
                        $('.nouserfound').empty();
                    $('.users-found').html(data);
                }},

            });
        })
    </script>
@endsection

