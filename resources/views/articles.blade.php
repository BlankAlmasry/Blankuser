@extends('layouts.master')
@section('header')
    <title>Articles - BlankUser</title>
    <meta name="description" content="Articles meta and categories">
    <meta name="keywords" content="articles,writer,author,categories,blankuser,blog">
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


                    <div class=" col-12 col-md-9 col-lg-10 text-center text-dark px-4 pt-4  ">
                        <div class="bg-white explore-article pb-5">
                            <div class="our-articles mb-5  ">
                                <h1 class="mb-4 ">Articles</h1>
                                <p>Our Articles is written by admin or users , CopyRights preserved for Author. </p>
                                <p>Our goal is to make respected Blog That allow user to add , edit and rate it's Articles under scientific evidence.</p>
                            </div>
                            <div class="rules mb-5  px-5">
                                <h1 class="mb-4">Meta</h1>
                                <p>Any Content Other than allowed Categories , will result into ban.</p>
                            </div>
                            <div class="approval mb-5  px-5">
                                <h1 class="mb-4">Approval</h1>
                                <p>Publish Article need to be approved by admin just in case of spam , mistakes or CopyRight issue. </p>
                            </div>
                            <h2>Main Categories</h2>

                            <table class="table table-bordered">
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

                            <a href="/add-article" class="float-right mt-1  mr-1 btn btn-primary">Add Post</a>
                        </div>



                    </div>



                @endsection
                @section('grid-footer')
            </div>
        </div>
    </div>
@endsection

