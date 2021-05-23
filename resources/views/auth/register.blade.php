@extends('layouts.app')

@section('header')
@include('partials.auth-header')

@endsection

@section('content')
    <section class="section-content padding-y">

        <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:650px; margin-top:40px;">
            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Sign up</h4>
                </header>
                <form method="POST" action="{{route('register')}}">
                  @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Full name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">Your email remain private with us.</small>
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" placeholder="phone" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Account Type</label>
                            <select id="inputState" class="form-control @error('role') is-invalid @enderror" name="role"
                                required>
                                <option value=""> Choose...</option>
                                <option value="Buyer">Buyer</option>
                                <option value="Vendor">Vendor</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- form-group end.// -->
                    </div>

                    <!-- form-group end.// -->
                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" checked="" type="radio" name="gender" value="Male" required>
                            <span class="custom-control-label"> Male </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="gender" value="Female" required>
                            <span class="custom-control-label"> Female </span>
                        </label>


                    </div> <!-- form-group end.// -->
                    <div class="form-row">

                      <div class="form-group col-md-6">
                        <label>Country</label>
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                            name="country" value="{{ old('country') }}" placeholder="country" required
                            autocomplete="country">

                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                            name="city" value="{{ old('city') }}" placeholder="city" required
                            autocomplete="city">

                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div> <!-- form-group end.// -->
                      
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                            name="state" value="{{ old('state') }}" placeholder="state" required
                            autocomplete="state">

                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Zip</label>
                            <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror"
                                name="zip" value="{{ old('zip') }}" placeholder="zip" required
                                autocomplete="zip">

                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- form-group end.// -->
                    </div>
                    <!-- form-row.// -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Repeat password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="confirm password">
                        </div> <!-- form-group end.// -->
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Register </button>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input"
                                checked="">
                            <div class="custom-control-label"> I agree with <a href="#">terms and contitions</a> </div>
                        </label>
                    </div> <!-- form-group end.// -->
                </form>
            </article><!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Have an account? <a href="{{ route('login') }}">Log In</a></p>
        <br><br>
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->

    </section>
@endsection
