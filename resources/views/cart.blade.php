@extends('layouts.app')

@section('header')

    @include('partials.header')

@endsection

@section('content')
  
@if(Cart::count())
   <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">
        @include('partials.alert-message')
        <div class="row">
            <main class="col-md-9">
                <div class="card table-responsive">

                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" class="text-right" width="200"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Cart::count())

                                @foreach (Cart::content() as $item)

                                    @include('partials.cart-item')

                                @endforeach

                            @else
                            @endif
                        </tbody>
                    </table>

                    <div class="card-body border-top">
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary float-md-right">Proceed to checkout 
                            <i class="fa fa-chevron-right"></i> </a>
                        <a href="{{ url('/') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue
                            shopping </a>
                    </div>
                </div> <!-- card.// -->

                <div class="alert alert-success mt-3">
                    <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
                </div>

            </main> <!-- col.// -->
            <aside class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="" placeholder="Coupon code">
                                    <span class="input-group-append">
                                        <button class="btn btn-primary">Apply</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div> <!-- card-body.// -->
                </div> <!-- card .// -->
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right">USD {{ Cart::subtotal() }}</dd>
                        </dl>
            <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right  h5"><strong>${{ Cart::total() }}</strong></dd>
                        </dl>
                        <hr>
                        <p class="text-center mb-3">
                            <img src="/app/images/misc/payments.png" height="26">
                        </p>

                    </div> <!-- card-body.// -->
                </div> <!-- card .// -->
            </aside> <!-- col.// -->
        </div>

    </div> <!-- container .//  -->
</section>
 
@else
<main class="col-md-9 mx-auto mt-5">
    <div class="card">

        <div class="card-body border-top">
       
            <a href="{{ url('/') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue
                shopping </a>
        </div>
    </div> <!-- card.// -->

    <div class="alert alert-info mt-3">
        <p class="icontext"><i class="icon text-success fa fa-truck"></i> No item in your cart</p>
    </div>

</main>
@endif
    <!-- ========================= SECTION CONTENT END// ========================= -->
    
    <!-- ========================= SECTION  ========================= -->
    <section class="section-name border-top padding-y">
    <div class="container">
    <h6>Payment and refund policy</h6>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
    </div><!-- container // -->
    </section>
    <!-- ========================= SECTION  END// ========================= -->
    

@endsection
