@extends('layouts.master')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <div class="PageBody">
    <form action="\edit-article\{{$article->id}}" method="post" enctype="multipart/form-data "  >
        @csrf
        <div class="mt-5 title-form">
            <div class="container pt-3">
                <label for="title" class="mt-5 d-inline ">Blankuser . <span>Post</span></label>
                <div class="form-group">

                    <input type="text" class="form-control form-control d-inline-block w-75" name="title" id="title" value="{{$article->title}}" required maxlength="120" placeholder="Title" >
                    <button type="submit" class="btn btn-success" value="" id="formsubmit">Update</button>
                </div>
            </div>
            @include('layouts.error')
            <div class="container">
                <div class="row no-gutters p-0 m-0">
                    <div class="col-12 col-md-9 ">

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class=" w-100 h-100" id="body" required ="300"></textarea>
                        </div>
                    </div>
                    <div class=" col-12 col-md-3 p-0 m-0 pl-2">
                        <div class="form-group pl-2 mt-md-4">
                            <input type="file" name="image" id="image" class="form-control-file">
                            <a href="/images/{{$article->img}}" class="form-text text-primary">Image :{{substr($article->img,10)}}</a>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">Tags</div>
                            <div class="card-body p-3">
                                <div class="form-group">
                                    <label class="small text-muted" for="tags">separate by Comma </label>
                                    <input type="text" id="tags" class="form-control form-control-sm" name="tags" value="@foreach($article->tags->pluck('name') as $tag) {{$tag.','}} @endforeach">
                                    <div id="span-carrier">
                                        <span class="small text-muted error-reporter float-right text-center">Max 30 character</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <label for="category" class="card-header">Category</label>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="category" class="form-control" id="category">
                                        <option value="Science" @if($article->category->name =='science'){{'selected'}}@endif class="form-control">Science</option>
                                        <option value="Technology" @if($article->category->name =='Technology'){{'selected'}}@endif  class="form-control">Technology</option>
                                        <option value="Engineer" @if($article->category->name =='Engineer'){{'selected'}}@endif  class="form-control">Engineer</option>
                                        <option value="Mathematics" @if($article->category->name =='Mathematics'){{'selected'}}@endif  class="form-control">Mathematics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('footer')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>
    <script>

        $(function() {

            $('textarea').froalaEditor({
                imageUploadParam: 'floara',
                imageUploadMethod: 'post',
                // Set the image upload URL.
                imageUploadURL: "{{ url('/add-article/floara') }}",
                imageUploadParams: {
                    froala: 'true',
                    _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
                }
            });
        });
        $(document).ready(function () {
            $('.fr-element p').remove();
            $('.fr-element').html('{!! $article->body !!}');

        });
    </script>
@endsection
