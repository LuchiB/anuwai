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
                <main class="col-md-9">

					@include('partials.alert-message')
					
                    <article class="card mb-3">
                        <div class="card-body">

                            <figure class="icontext">
                                <div class="icon">
                                    @if (\Auth::user()->image != null)
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/{{ \Auth::user()->image }}">
                                    @else
                                        <img class="rounded-circle img-sm border"
                                            src="/app/images/avatars/default-avatar.png">
                                    @endif

                                </div>
                                <div class="text">
                                    <strong>{{ Auth::user()->name }} </strong> <br>
                                    <p class="mb-2"> {{ Auth::user()->email }} </p>
                                    <a href="{{route('buyer.setting')}}" class="btn btn-light btn-sm">Edit</a>
                                </div>
                            </figure>
                            <hr>
                            <p>
                                <i class="fa fa-map-marker text-muted"></i> &nbsp; My address:
                                <br>
                                {{Auth::user()->address->country ?? ''}} {{Auth::user()->address->city ?? ''}} {{Auth::user()->address->state ?? ''}}  
                                {{-- <a href="{{route('vendor.profile',Auth::user()->id)}}" class="btn-link"> Edit</a> --}}
                            </p>

                        </div> <!-- card-body .// -->
                    </article> <!-- card.// -->

                    <article class="card  mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Pending orders </h5>
							@if (count($orders)>0)
							<div class="row">
                               @foreach ($orders as $order)

							   @foreach($order->products as $product)
							   <div class="col-md-6">
								<figure class="itemside mb-3">
									<div class="aside"><img src="/app/images/arts/{{$product->image}}" class="border img-sm"></div>
									<figcaption class="info">
										<time class="text-muted"><i class="fa fa-calendar-alt"> </i> {{ \Carbon\Carbon::parse( $order->created_at )->diffForHumans() }}</time>
										<p>{{$product->name}}</p>
										<span class=" {{$order->status == 1 ? 'text-success' : 'text-danger'}}">{{$order->status == 1 ? 'Shipped' : 'Not shipped'}}</span>
									</figcaption>
								</figure>
							</div> <!-- col.// -->
						   @endforeach
						
							   @endforeach
                               
                            </div> <!-- row.// -->

                            <a href="#" class="btn btn-outline-primary btn-block"> See all orders <i
                                class="fa fa-chevron-down"></i> </a>
							@else
                            <a href="#" class="btn btn-outline-primary btn-block"> No orders found! </a>
							@endif
                         

                      
                        </div> <!-- card-body .// -->
                    </article> <!-- card.// -->

                </main> <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
