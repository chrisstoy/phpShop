<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageName; ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
        <link rel="stylesheet" href="/client/global.css">

    </head>
    <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/">phpShop</a>
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
			<button type="button" class="btn btn-default btn-sm navbar-btn navbar-right">
				<span class="glyphicon glyphicon-shopping-cart">Cart</span>
			</button>
          </div>
        </nav>

