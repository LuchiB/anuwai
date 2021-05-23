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
                            <form class="row" method="POST" action="{{route('buyer.updateprofile')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-9">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>Name</label>
                                            <input id="name" type="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ Auth::user()->name }}" placeholder="name" required
                                                autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group">
                                            <label>Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ Auth::user()->email }}" placeholder="Email" required
                                                autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
            
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Country</label>
                                            <input id="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                            value="{{$address->country ?? ''}}" placeholder="country" required
                                            autocomplete="country">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{$address->city ?? ''}}" placeholder="city" required
                                            autocomplete="city">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
            
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>State</label>
                                            <input id="state" type="text"
                                            class="form-control @error('state') is-invalid @enderror" name="state"
                                            value="{{$address->state ?? ''}}" placeholder="state" required
                                            autocomplete="state">
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>Phone</label>
                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{$address->phone ?? ''}}" placeholder="phone" required
                                                autocomplete="phone">
            
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
            
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Zip</label>
                                            <input type="text" class="form-control  @error('zip') is-invalid @enderror" value="{{$address->zip ?? ''}}" name="zip">
                                            
                                            @error('zip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>photo</label>
                                            <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            value="{{$address->image ?? ''}}" >
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
            
                                 <div class="btn-group">
                                    <button class="btn btn-info" type="submit">Update</button>
                                    &nbsp;
                                    {{-- <a href="{{route('admin.setting')}}" class="btn btn-warning">Change password</a> --}}
                                 </div>
            
                                </div> <!-- col.// -->
                                <div class="col-md">
                                    @if (\Auth::user()->image != null)
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/{{ \Auth::user()->image }}">
                                    @else
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/default-avatar.png">
                                    @endif
                                </div> <!-- col.// -->
                            </form>
                        </div> <!-- card-body.// -->
                    <!-- card .// -->
                </main>
                <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
