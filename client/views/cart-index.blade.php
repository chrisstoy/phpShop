@extends('master')

@section('body')

    <div class="well">

        <div class="panel panel-info">

            <div class="panel-heading">
                <h3>Shopping Cart</h3>
            </div>

            <div class="panel-body">
                <ol class="list-group">
                @if (count($lineItems) == 0)
                    <li class="list-group-item">
                        <div class="row">
                            <h3 class="text-center text-info">No items in your cart.</h3>
                        </div>
                    </li>
                @else
                    @foreach ( $lineItems as $lineItem )
                        <li class="list-group-item">
                            <div class="row">
                                <a href="/pdp?productId={{$lineItem->product->id}}">
                                <div class="col-sm-1">
                                    <img src='{{$lineItem->product->image}}' class="center-block product-image">
                                </div>
                                <div class="col-sm-7">
                                    <p class="list-group-item-text">{{$lineItem->product->name}}</p>
                                </div>
                                </a>
                                <div class="col-sm-3">
                                    <span class="text text-default pull-right"><strong>Price: <span class="text text-danger">{{money_format('$%i', $lineItem->cartItem->price)}}</span></strong></span>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removeItemDlg"
                                        data-product-name="{{$lineItem->product->name}}"
                                        data-cart-id="{{$cart->cartId}}"
                                        data-item-id="{{$lineItem->cartItem->itemId}}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
                </ol>
                <div class="pull-right">
                    <h5 lass="text text-default">Number of Items: <span class="text text-warning">{{$cart->numberOfItemsInCart()}}</span></h5>
                    <h3 lass="text text-default"><strong>Total: <span class="text text-danger">{{money_format('$%i', $cart->cartValue())}}</span></strong></h3>

                    @if ($cart->numberOfItemsInCart())
                        <form action="/cart/checkout" method="get" class="form-inline">
                            <input type="hidden" name="cartId" value="{{$cart->cartId}}" class="cartId">
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div id="removeItemDlg" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Remove from Cart</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to remove item <em>&quot;<span class="productName text-info"></span>&quot;</em> from  your cart?</p>
                </div>
                    <div class="modal-footer">
                    <form action="/cart/remove" method="post" class="form-inline">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="cartId" value="" class="cartId">
                        <input type="hidden" name="itemId" value="" class="itemId">
                        <button type="submit" class="btn btn-primary">Remove</button>
                    </form>
                </div>
             </div>
        </div>
    </div>
@endsection

@section('scripts')
        @parent

        <script>
            $('#removeItemDlg').on('show.bs.modal', function(e) {

                //get data-id attribute of the clicked element
                var itemId = $(e.relatedTarget).data('item-id');
                var cartId = $(e.relatedTarget).data('cart-id');
                var productName = $(e.relatedTarget).data('product-name');

                $(e.currentTarget).find('.itemId').val(itemId);
                $(e.currentTarget).find('.cartId').val(cartId);
                $(e.currentTarget).find('.productName').text(productName);
            });
        </script>

@endsection