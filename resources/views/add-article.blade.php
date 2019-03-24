@extends('layouts.master')
@section('header')
    <title>Write article - BlankUser</title>
    <meta name="description" content="Online magazine who every one can read ! , Start writing your article now ">
    <meta name="keywords" content="article,magazine,scientific,blog,author,writer">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <div class="PageBody">
    <form action="add-article" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-5 title-form">
        <div class="container pt-3">
            <label for="title" class="mt-5 d-inline ">Blankuser . <span>Post</span></label>
            <div class="form-group">
                <div class="row no-gutters ">
                    <div class="col-9">
            <input type="text" class="form-control form-control d-inline-block " name="title" id="title" required maxlength="120" placeholder="Title" >
                    </div>
                <div class="col-3 "><button type="submit" class="btn btn-success ml-1 " value="" disabled id="formsubmit">Publish</button></div>
                </div>
        </div>
    </div>
        @include('layouts.error')
    <div class="container">
        <div class="row no-gutters p-0 m-0">
            <div class="col-12 col-md-9 ">

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class=" w-100 h-100" id="body" minlength="300"></textarea>
                    </div>
            </div>
            <div class=" col-12 col-md-3 p-0 m-0 pl-2">
                <div class="form-group pl-2 mt-md-4">
                    <input type="file" name="image" id="image" class="form-control-file" required>
                    <label for="image" class="form-text text-muted">Image Upload</label>
                </div>
                <div class="card mb-2">
                    <div class="card-header">Tags</div>
                    <div class="card-body p-3">
                        <div class="form-group">
                            <input  id="tags" name="tags"  class="form-control mb-2" required maxlength="120">
                            <label class="small text-muted" for="tags">separate by Comma </label>
                        <div id="span-carrier">
                        <span class="small text-muted error-reporter float-right text-center">Max 120 character (including spaces)</span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <label for="category" class="card-header">Category</label>
                    <div class="card-body">
                        <div class="form-group">
                            <select name="category" class="form-control" id="category">
                                <option value="Science">Science</option>
                                <option value="Technology" selected>Technology</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Mathematics">Mathematics</option>
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



            {{--$.ajaxSetup({--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}
            {{--$.ajax({--}}
                {{--url: "{{ url('/add-article') }}",--}}
                {{--type: 'POST',--}}
                {{--data: {--}}
                    {{--title:jQuery('input[name="title"]').val() ,--}}
                    {{--body: jQuery('textarea[name="body"]').val(),--}}
                    {{--img: jQuery('input[name="image"]').val(),--}}
                    {{--tags:jQuery('input[name="tags"]').val(),--}}
                    {{--category: jQuery('select option:selected').val()--}}
                {{--},--}}
                {{--success: function(result){--}}
                {{--},--}}
                {{--error: function (data) {--}}
                    {{--var errors = data.responseJSON;--}}
                    {{--console.log(errors);--}}
                    {{--errorsHtml = '<div class="alert alert-danger mb-0"><ul class="list-unstyled font-weight-bold small text-danger p-0">';--}}
                    {{--$.each(errors.errors,function (k,v) {--}}
                        {{--errorsHtml += '<li>'+ v + '</li>';--}}
                    {{--});--}}
                    {{--errorsHtml += '</ul></di>';--}}

                    {{--$( '#errors' ).html( errorsHtml );--}}
                {{--}--}}
            {{--});--}}














    </script>
    <script>
$('.fr-counter').html(-140);
setInterval(function () {
    $('#formsubmit').attr('disabled','disabled');

    if(($('#title').val().length > 1)&&($('#tags').val().length >0)&&($('.fr-counter').html() >299&&($('#image').val()!==""))){
    if($('#formsubmit').attr('disabled')==="disabled"){
        $('#formsubmit').removeAttr('disabled')
    }
    else{
            $('#formsubmit').attr('disabled','disabled')

    }
}
    },3000);
        window.onload = function(){
            $('a[style^="padding: 5px 10px;color: #FFF;text-decoration: none;background: #EF5350;display: block;font-size: 15px;"]').hide();
        }
    </script>
@endsection
