@extends('layouts.master')
@section('header')
    <title>Article Categories - BlankUser.com</title>
    <meta name="description" content="Our Article Categories are Science , Technology , Engineer and mathematics (STEM) .">
    <meta name="keywords" content="STEM,article,categories,science,math,mathematics,tech,technology,engineer">
@endsection
@section('grid-header')
    <div class="Web-body mt-4 pt-3 PageBody">
        <div class="container">
            <div class="row">
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('body')
                    <div class="col-12 col-md-9 col-lg-10 text-center text-dark px-3 mt-4 ">
                        <div class="container bg-white ">
                            <div class=" px-1  pt-2 px-lg-5 mx-lg-5  pb-5">
                                <h1>Categories</h1>
                                <p>Our articles based on 4 main Categories which are Science , Technology , Engineer and Mathematics </p>
                                <br><br>
                                <table class="table table-bordered  ">
                                    <tr>
                                        <th>Category</th>
                                        <th>Articles</th>
                                        <th>Points</th>
                                    </tr>
                                    @foreach($categories as $category)
                                    <tr onclick="window.location.href='/{{strtolower($category->name)}}'">
                                        <td >{{$category->name}}</td>
                                        <td>{{$category->articles()->count()}}</td>
                                        <td>{{$category->points}}</td>
                                    </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endsection
@section('grid-footer')
            </div>
        </div>
    </div>
@endsection

