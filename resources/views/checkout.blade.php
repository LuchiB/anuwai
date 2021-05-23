@extends('layouts.app')

@section('header')

    @include('partials.header')

@endsection

@section('content')

    <section class="section-content padding-y bg">
        <div class="container">

            <!-- ============================ COMPONENT 2 ================================= -->
            <div class="row">
                <main class="col-md-8">
                    @if (Cart::count())

                        {{-- CART REVIEW --}}
                        <article class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Review cart</h4>
                                <div class="row">
                                    @foreach (Cart::content() as $item)

                                        @include('partials.order-item')

                                    @endforeach

                                </div> <!-- row.// -->
                            </div> <!-- card-body.// -->
                        </article> <!-- card.// -->
                    @endif

                    {{-- USER CONTACT INFO --}}
                    <article class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Contact info</h4>
                            <form method="POST" action="{{route('buyer.order.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Full name</label>
                                            <input type="text" placeholder="Type here" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ Auth::user()->name }}" name="name" required>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="email" placeholder="example@gmail.com" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ Auth::user()->email }}" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label>Phone</label>
                                            <input type="text" value="{{ $address->phone }}" class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" required>
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div> <!-- row.// -->

                        </div> <!-- card-body.// -->
                    </article> <!-- card.// -->

                    {{-- DELIVERY INFO --}}
                    <article class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Delivery info</h4>
                          
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="js-check box active">
                                            <input type="radio" name="dostavka" value="option1" checked="">
                                            <h6 class="title">Delivery</h6>
                                            <p class="text-muted">We will deliver by DHL Kargo</p>
                                        </label> <!-- js-check.// -->
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="js-check box">
                                            <input type="radio" name="dostavka" value="option1">
                                            <h6 class="title">Pick-up</h6>
                                            <p class="text-muted">Come to our office to somewhere </p>
                                        </label> <!-- js-check.// -->
                                    </div>
                                </div> <!-- row.// -->


                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>City*</label>
                                        <input type="text" placeholder="Type here" class="form-control @error('city') is-invalid @enderror"
                                            value="{{ $address->city ?? '' }}" name="city" required>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>State*</label>
                                        <input type="text" placeholder="Type here" class="form-control @error('state') is-invalid @enderror" name="state"
                                            value="{{ $address->state ?? '' }}" required>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label>Country</label>
                                        <input type="text" placeholder="" class="form-control @error('country') is-invalid @enderror" name="country"
                                            value="{{ $address->country ?? '' }}" required>
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Zip</label>
                                        <input type="text" placeholder="" class="form-control @error('zip') is-invalid @enderror" name="zip"
                                            value="{{ $address->zip ?? '' }}" required>
                                            @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div> <!-- row.// -->

                        </div> <!-- card-body.// -->
                        <hr>
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit">Complete Order </button>
                            &nbsp;
                            <a href="{{ route('shop.index') }}" class="btn btn-info">Continue Shopping </a>
                        </div>
                    </article> <!-- card.// -->
                </form>
                    {{-- PAYMENT INFO --}}
                    <article class="accordion" id="accordion_pay">
                       
                       
                        <div class="card">
                            <header class="card-header">
                                <img src="/app/images/misc/payment-bank.png" class="float-right"
                                    height="24">
                                <label class="form-check" data-toggle="collapse" data-target="#pay_card">
                                    <input class="form-check-input" name="payment-option" type="radio" value="option1">
                                    <h6 class="form-check-label"> Bank Transfer </h6>
                                </label>
                            </header>
                            <div id="pay_card" class="collapse" data-parent="#accordion_pay">
                                <div class="card-body">
                                    <p class="text-muted">Some instructions about how to pay </p>
                                    <p>
                                        Bank of America, Account number: 12345678912346 <br>
                                        IBAN: 12345, SWIFT: 987654
                                    </p>
                                </div> <!-- card body .// -->
                            </div> <!-- collapse .// -->
                        </div> <!-- card.// -->

                      
                    </article>
                    <!-- accordion end.// -->
             
                    {{-- OVER VIEW --}}
                </main> <!-- col.// -->
                <aside class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="mb-3">Overview</h4>
                            <dl class="dlist-align">
                                <dt class="text-muted">Delivery:</dt>
                                <dd>Pick-up</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt class="text-muted">Delivery type:</dt>
                                <dd>Standart</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt class="text-muted">Payment method:</dt>
                                <dd>Cash</dd>
                            </dl>
                            <hr>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="h5">${{ Cart::total() }}</dd>
                            </dl>
                            <hr />

                        </div> <!-- card-body.// -->
                    </div> <!-- card.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->

            <!-- ============================ COMPONENT 2 END//  ================================= -->

        </div> <!-- container .//  -->
    </section>

@endsection
