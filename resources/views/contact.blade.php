@extends('layouts.master')
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
                        <div class="container bg-white mt-5">
                            <h1 class="text-center pt-4">Contact Us</h1>
                            <p class="text-center text-muted pb-4">We will response as fast as we can</p>
                            <div class="form-area">
                                <form  method="post" action="contact">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" type="textarea" id="message" name="body" placeholder="body" maxlength="1200" rows="7"></textarea>
                                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                                    </div>
                                    <input type="submit" id="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                                </form>
                                @include('layouts.error')
                            </div>
                        </div>
                    </div>
                    @include('layouts.flash-session')

                @endsection
@section('grid-footer')
            </div></div><div>
@endsection
@section('footer')
                <script src="/js/contact.js"></script>
@endsection
