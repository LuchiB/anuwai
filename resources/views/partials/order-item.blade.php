{{-- <div class="item">
    <div class="image">
        <img src="/images/laptop.jpg">
    </div>
    <div class="content">
        <a class="header" href="{{ $item->model->path() }}">
            {{ $item->name }}
        </a>

        <div class="description">
            <p>{{ $item->model->details }}</p>
        </div>

        <div class="meta">
            <span class="cinema red">{{ $item->model->present_price }}</span>
        </div>
    </div>

    <div class="quantity">
        <span>{{ $item->qty }}</span>    
    </div>

</div> --}}



            <div class="col-md-6">
                <figure class="itemside  mb-4">
                    <div class="aside"><img src="/app/images/arts/{{$item->model->image}}" class="border img-sm"></div>
                    <figcaption class="info">
                        <p>{{$item->name}} </p>
                        <span class="text-muted">{{$item->qty}}x = ${{$item->qty * $item->price}} </span>
                    </figcaption>
                </figure>
            </div>
            
     
    
