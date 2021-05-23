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
                    <div class="card">
                      
                        <div class="card-body">
                            <form class="row" action="{{route('admin.category.update',$category->id)}}" method="POST" >
                                @csrf
                                @method('PUT')
                                
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>Art Category</label>
                                         
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name }}" 
                                                placeholder="category name" required>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div> <!-- form-group end.// -->
                              
                                    </div> <!-- form-row.// -->

                                    <div class="btn-group">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="{{route('admin.category.index')}}" class="btn btn-info" >view</a>
                                    </div>

                                </div> <!-- col.// -->

                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->



                </main> <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
