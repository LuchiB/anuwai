@extends('layouts.app',['title'=>'Home - Anuwai Arts'])

@section('header')

    @include('partials.header')

@endsection

{{-- include the website content --}}
@section('content')
    <div class="container-fluid">
        <!-- ========================= SECTION MAIN  ========================= -->
        {{-- SLIDER STARTS --}}
        <section class="section-main padding-y">
            <div class="row">
                   
                <div class="col-md-12 col-xl-12 col-lg-12">

                    <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
                    <div id="carousel" class="carousel slide hero-slides" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li class="active" data-target="#carousel" data-slide-to="0"></li>
                          <li data-target="#carousel" data-slide-to="1"></li>
                          <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item active boat">
                            <div class="container h-100 d-none d-md-block">
                              <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                  <div class="caption animated fadeIn">
                                    <h2 class="animated fadeInLeft">Anuwai Arts</h2>
                                    <p class="animated fadeInRight">Dream,Paint And Decorate</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item sea">
                            <div class="container h-100 d-none d-md-block">
                              <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                  <div class="caption animated fadeIn">
                                  <h2 class="animated fadeInLeft">Anuwai Arts</h2>
                                    <p class="animated fadeInRight">Style Meet Substance</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item river">
                            <div class="container h-100 d-none d-md-block">
                              <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                  <div class="caption animated fadeIn">
                                    <h2 class="animated fadeInLeft">Anuwai Arts</h2>
                                    <p class="animated fadeInRight">Enhance Your Space.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->

                </div> 

            </div> 
        </section>
        {{-- SLIDER ENDS --}}
        <!-- ========================= SECTION MAIN END// ========================= -->


        <!-- =============== PRODUCT SECTION  =============== -->
        @if (count($products) > 0)
            @include('partials.product')
            @endif
        <!-- =============== PRODUCT SECTION  END =============== -->

        <!-- =============== SECTION REQUEST =============== -->

        <section class="padding-bottom">
            <header class="section-heading heading-line">
                <h4 class="title-section text-uppercase">No Art Found</h4>
            </header>

            <div class="row">
                <div class="col-md-8">
                    <div class="card-banner banner-quote overlay-gradient"
                        style="background-image: url('/slider/images/shutterstock_399986941.jpg');">
                        <div class="card-img-overlay white">
                            <h3 class="card-title">An easy way to send request to suppliers</h3>
                            <p class="card-text" style="max-width: 400px">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod
                                tempor incididunt.</p>
                            <a href="default.htm" class="btn btn-primary rounded-pill">Learn more</a>
                        </div>
                    </div>
                </div> <!-- col // -->
                <div class="col-md-4">

                    <div class="card card-body">
                        <h4 class="title py-3">One Request, Multiple Quotes</h4>
                        <form>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="What are you looking for?" type="text">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Quantity" name="" type="text">

                                    <select class="custom-select form-control">
                                        <option>Pieces</option>
                                        <option>Litres</option>
                                        <option>Tons</option>
                                        <option>Gramms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-muted">
                                <p>Select template type:</p>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="option1">
                                    <span class="form-check-label">Request price</span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="option2">
                                    <span class="form-check-label">Request a sample</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-warning">Request for quote</button>
                            </div>
                        </form>
                    </div>

                </div> <!-- col // -->
            </div> <!-- row // -->
        </section>

        <!-- =============== SECTION REQUEST .//END =============== -->

    </div>

@endsection
