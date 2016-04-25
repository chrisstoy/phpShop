<?php $pageName = "phpShop - Main"; ?>

<!-- display today's random products -->
<h2>Today's Random Products</h2>
<div class="panel">
    <?php
        $imageUrl = 'http://placehold.it/150x150?text=Item+Image+Goes+Here';
        $test = new Product('test', 'item', "$imageUrl");

        $data = array(
        );
    ?>
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <a href="/pdp.php?productId=x">
                <img src='<?php echo "{$test->image}"; ?>'>
                <h3>Item Name</h3>
                <p>This is the description of the item. It will happily fit here.</p>
            </a>
        </div>
        <div class="col-xs-6 col-md-3">
            <a href="/pdp.php?productId=x">
                <img src="http://placehold.it/150x150?text=Item+Image+Goes+Here">
                <h3>Item Name</h3>
                <p>This is the description of the item. It will happily fit here.</p>
            </a>
        </div>
        <div class="col-xs-6 col-md-3">
            <a href="/pdp.php?productId=x">
                <img src="http://placehold.it/150x150?text=Item+Image+Goes+Here">
                <h3>Item Name</h3>
                <p>This is the description of the item. It will happily fit here.</p>
            </a>
        </div>
    </div>
</div>

