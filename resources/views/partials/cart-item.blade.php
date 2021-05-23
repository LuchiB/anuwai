
<tr>
    <td>
        <figure class="itemside">
            <div class="aside"><img src="/app/images/arts/{{$item->options->image}}" class="img-sm"></div>
            <figcaption class="info">
                <a href="#" class="title text-dark"> {{ $item->name }}</a>
                <p class="text-muted small">Category: {{$item->model->category->name}}</p>
            </figcaption>
        </figure>
    </td>
    <td> 
        <select name="quantity" id="quantity" class="quantity form-control" data-id="{{ $item->rowId }}">
            @foreach (range(1, 5) as $index)
                <option value="{{ $index }}" @if($item->qty == $index) selected @endif>{{ $index }}</option>
            @endforeach
        </select>
    </td>
    <td> 
        <div class="price-wrap"> 
            <var class="price">${{ $item->price  * $item->qty}}</var> 
            <small class="text-muted"> {{ $item->model->present_price }} each </small> 
        </div> <!-- price-wrap .// -->
    </td>
    <td class="text-right"> 
    <a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
    <a href="#" class="btn btn-danger remove-cart" data-remove-cart="{{ $item->rowId }}"> Remove</a>
    </td>
</tr>
<form action="{{ route('cart.destroy', $item->rowId) }}" style="display: none" method="POST" 
    id="remove-cart-{{ $item->rowId }}" class="ui left floated">
    @csrf @method('delete')
</form>
