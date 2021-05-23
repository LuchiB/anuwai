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
                  
                    <div class="row">
                        <div class="col-12">
                            
                            
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Categories</h5>
                                    @if (count($categories)>0)
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{ \Carbon\Carbon::parse( $category->created_at )->toFormattedDateString() }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                           
                                                            
                                                            <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
                                                                @csrf @method('delete')
                                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>   
                                                @endforeach
                                               
                                            </tfoot>
                                        </table>
                                    </div>
                    
                                    @else
                                       <div class="col-md-12">
                                        <div class="alert alert-info" role="alert">
                                            {{'No category Found'}}
                                            </div>
                                       </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </main> <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
@endsection
