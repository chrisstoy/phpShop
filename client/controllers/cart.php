<?php

namespace Controllers
{
    /**
     * Cart display
     */
    class cart extends BaseController
    {
        function getLineItemsFromCart($cart) {

            $productsCollection = new \Server\ProductsCollection();

            // get product details and create display line items
            $lineItems = [];
            foreach( $cart->_items as $item) {
                // todo -this should make sure the item still exists
                $product = $productsCollection->getProduct($item->productId);
                $lineItem = (object)[
                    'cartItem' => $item,
                    'product' => $product
                ];
                array_push($lineItems, $lineItem);
            }
            return $lineItems;
        }

        /**
         * Create the model for the Main index page
         */
        public function index($params) {

            $cartManager = new \Server\CartManager();
            $cart = $cartManager->getActiveCart();

            // get product details and create display line items
            $lineItems = $this->getLineItemsFromCart($cart);

            $viewModel = [
                'title' => "Cart",
                'cart' => $cart,
                'lineItems' => $lineItems
            ];

            return $this->result('cart-index', $viewModel);
        }
		
		/**
		 * Add a new item to the cart
		 */
		public function add($params) {

            $productId = isset($params->productId) ? $params->productId : null;

            $productsCollection = new \Server\ProductsCollection();
            $product = $productsCollection->getProduct($productId);

            if( isset($product) ) {
                // add the product to our cart
                $cartManager = new \Server\CartManager();
                $cart = $cartManager->getActiveCart();
                $cart->addProduct($product);
                $cartManager->saveCart($cart);
            }
            else {
                // Failed to find the product to add it to the cart
                return $this->result('pdp-not-found', [ 'title' => 'Product Not Found', 'productId' => $productId ]);
            }

			$viewModel = [
			    'title' => 'Add to Cart',
				'product' => $product
			];

			return $this->result('cart-add', $viewModel);
		}

		/**
		 * Removes the specified item from the cart
		 */
        public function remove($params) {

            $cartId = isset($params->cartId) ? $params->cartId : null;
            $itemId = isset($params->itemId) ? $params->itemId : null;

            if ( isset($cartId) && isset($itemId) ) {
                // add the product to our cart
                $cartManager = new \Server\CartManager();
                $cart = $cartManager->getCart($cartId);
                if (isset($cart) ) {

                    $item = $cart->removeItem($itemId);
                    $cartManager->saveCart($cart);

                    $productId = $item->productId;
                    $productsCollection = new \Server\ProductsCollection();
                    $product = $productsCollection->getProduct($productId);

                    $viewModel = [
                        'title' => 'Remove from Cart',
                        'product' => $product
                    ];

                    return $this->result('cart-remove', $viewModel);

                }
                else {
                    // Failed to find the product to add it to the cart
                    return $this->result('pdp-not-found', [ 'title' => 'Cart not found', 'productId' => $cartId ]);
                }
            }
            else {
                // Failed to find the product to add it to the cart
                return $this->result('pdp-not-found', [ 'title' => 'Product Not Found', 'productId' => $itemId ]);
            }
        }

        /**
         * Process checkout
         */
        public function checkout($params) {

            $cartId = isset($params->cartId) ? $params->cartId : null;
            $cartManager = new \Server\CartManager();
            $cart = $cartManager->getCart($cartId);
            if (isset($cart) ) {

                // get product details and create display line items
                $lineItems = $this->getLineItemsFromCart($cart);

                $viewModel = [
                    'title' => "Cart",
                    'cart' => $cart,
                    'lineItems' => $lineItems
                ];

                return $this->result('cart-checkout', $viewModel);
            }
            else {
                return $this->result('error', ['body'=>'Can not checkout with an empty cart']);
            }
        }
    }

}