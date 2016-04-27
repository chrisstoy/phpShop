@section('header')

        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/main">phpShop</a>
            </div>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Jump To...<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/main">Main</a></li>
						<li><a href="/category">Category</a></li>
						<li><a href="/cart">Cart</a></li>
						<li><a href="/pdp">Product Details</a></li>
					</ul>
				</li>
			</ul>
			<a href="/cart">
			    <button type="button" class="btn btn-default btn-sm navbar-btn navbar-right cart">
    				<span class="glyphicon glyphicon-shopping-cart">&nbsp;Cart</span>
	    		</button>
			</a>
          </div>
        </nav>

@endsection