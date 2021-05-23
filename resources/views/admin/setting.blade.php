@extends('layouts.app')


@section('header')
    @include('partials.header')
@endsection


@section('banner')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg-gray">
        <div class="container">
            <h2 class="title-page">My account</h2>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION PAGETOP END// ========================= -->
@endsection

@section('content')
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                @include('partials.aside')

                <!-- col.// -->
                <main class="col-md-9">
                    @include('partials.alert-message')
                    <div class="card">
                        <div class="card-body">
                            <form class="row" method="POST" action="{{route('buyer.updatepassword')}}">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-9">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>New Password</label>
                                            <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="new-password" placeholder="password">
            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group">
                                            <label>Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                            required autocomplete="new-password" placeholder="confirm password">
                                        </div> <!-- form-group end.// -->
                                    </div> 

                                   <div class="btn-group">
                                    <button class="btn btn-success" type="submit">Update</button>
                                    &nbsp;
                                    <a href="{{route('buyer.home')}}" class="btn btn-primary">Go Back</a>
                                   </div>

                                </div> <!-- col.// -->
                                <div class="col-md">
                                    @if (Auth::user()->image != null)
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/{{ Auth::user()->image }}">
                                    @else
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/default-avatar.png">
                                    @endif
                                </div> <!-- col.// -->
                            </form>
                        </div> <!-- card-body.// -->
                    </div>
                    <!-- card .// -->
                </main>
                <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
