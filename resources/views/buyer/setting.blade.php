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
                            <form class="row">
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
                                            <select id="inputState" class="form-control">
                                                <option> Choose...</option>
                                                <option>Uzbekistan</option>
                                                <option>Russia</option>
                                                <option selected="">United States</option>
                                                <option>India</option>
                                                <option>Afganistan</option>
                                            </select>
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <input type="text" class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>State</label>
                                            <input type="text" class="form-control" value="123009">
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
                                            <input type="text" class="form-control" value="123009">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-md-6">
                                            <label>photo</label>
                                            <input type="file" class="form-control" value="+123456789">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-light">Change password</button>

                                    <br><br><br><br><br><br>

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
                    </div>
                    <!-- card .// -->
                </main>
                <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
