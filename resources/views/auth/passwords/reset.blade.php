@extends('layouts.master')
@section('body')
<main class="py-5 mt-5 PageBody">
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>
                        <div class="card-body"><form method="POST" action="http://127.0.0.1:8000/password/reset">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" name="email" value="" required="required" autofocus="autofocus" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" name="password" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6"><input id="password-confirm" type="password" name="password_confirmation" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-0"><div class="col-md-6 offset-md-4"><button type="submit" class="btn btn-primary">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @include('layouts.error')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
