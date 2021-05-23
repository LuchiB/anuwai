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
                            <form class="row" method="POST" action="{{ route('admin.update.user', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-9">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>Name</label>
                                            <input id="name" type="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $user->name }}" placeholder="name" required autocomplete="name"
                                                autofocus>

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
                                                value="{{ $user->email }}" placeholder="Email" required
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
                                            <input type="text" class="form-control" value="{{ $address->country ?? ""}}" name="country">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $address->city ?? " "}}">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>State</label>
                                            <input type="text" class="form-control" value="{{ $address->state ?? "" }}" name="state">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>Phone</label>
                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ $address->phone ?? " "}}" placeholder="phone"
                                                autocomplete="phone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Verification Status</label>
                                            <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="status">
                                                <option value=""> Choose...</option>
                                                @if ($user->status === 0)
                                                <option value="1">Verified</option>
                                                <option value="0" selected>Verify</option>
                                                @else
                                                <option value="1" selected>Verified</option>
                                                <option value="0">Verify</option> 
                                                @endif
                                                
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> <!-- form-group end.// -->
                             
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" value="{{ $address->zip ?? ""}}"
                                                name="zip">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>photo</label>
                                            <input type="file" class="form-control" name="image">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="btn-group">
                                        <button class="btn btn-success" type="submit">Update</button>
                                        &nbsp;
                                        <a href="{{ route('admin.resetpassword', $user->id) }}" class="btn btn-info">Reset
                                            password</a>
                                        &nbsp;
                                        <a href="{{ route('admin.home') }}" class="btn btn-primary">Go Back</a>
                                    </div>

                                </div> <!-- col.// -->
                                <div class="col-md">
                                    @if ($user->image != null)
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/{{ $user->image }}">
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
