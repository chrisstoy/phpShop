<?php global $pageName; $pageName = "phpShop - Main"; ?>

<div class="container-fluid">
	<!-- display today's random products -->
	<h2>Today's Random Products</h2>
	<div class="panel">
		<?php
			$imageUrl = 'http://placehold.it/150x150?text=Item+Image+Goes+Here';

			$products = array(
				new Product('test1', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test2', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test3', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test4', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test5', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test6', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test7', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test8', 'This is the description of the item. It will happily fit here.', "$imageUrl"),
				new Product('test9', 'This is the description of the item. It will happily fit here.', "$imageUrl")
			);

			shuffle($products);
		?>
		<div class="well well-lg">
		
			<div class="row">
			<?php foreach( $products as $product ) { ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<a href="/pdp.php?productId=x">
								<img src='<?php echo "{$product->image}"; ?>'>
								<h3 class="text-center"><?php echo "{$product->name}" ?></h3>
								<p class="text-center"><?php echo "{$product->blurb}" ?></p>
							</a>
						</div>
					</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>

