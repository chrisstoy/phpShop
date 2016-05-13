@section('header')
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/main">phpShop</a>
            </div>
              <div class="pull-right">
                  <a href="/cart">
                      <button type="button" class="btn btn-default btn-sm navbar-btn navbar-right cart">
                          <span class="glyphicon glyphicon-shopping-cart"><span class="cart-total">{{$GLOBALS['currentCartCount']}}</span> Cart</span>
                      </button>
                  </a>
              </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Areas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/main">Products</a></li>
                            <li><a href="/category">Categories</a></li>
                            <li><a href="/cart">Cart</a></li>
                        </ul>
                    </li>
                </ul>
			</div>
          </div>
        </nav>

@endsection