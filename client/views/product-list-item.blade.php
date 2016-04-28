@section('product-list-item')
    <div class="list-group-item product-list-item">
        <img src='{{$product->image}}' class="product-image">
        <p class="list-group-item-text">{{$product->name}}</p>
    </div>
@endsection
