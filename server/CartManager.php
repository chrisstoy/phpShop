<?php

namespace Server
{
	class CartManager
	{
		/**
		 * Create a new collection using the passed DataSource
		 */
		function __construct($dataSource=null) {

			$this->_dataSource = $dataSource;

            // load the test cart
            $this->_activeCart = $this->getCart('test');
		}

		/**
		 * Adds the product to the current cart.
		 */
		public function getActiveCart() {
            return $this->_activeCart;
		}

		/**
		 * Saves the active cart
		 */
		public function saveCart($cart) {
            // todo - for now, use file system
            $rawData = json_encode($cart);
            $cartFile = SYSTEM_PATH.'.cache'.DS.$cart->cartId.'_cart.json';
            file_put_contents($cartFile, $rawData);
		}
		
		/**
		 * Loads the requested Cart
		 */
		public function getCart($cartId) {

            // todo - for now, use file system
            $cartFile = SYSTEM_PATH.'.cache'.DS.$cartId.'_cart.json';
            if ( file_exists($cartFile) ) {
                $rawData = file_get_contents($cartFile);
                $parsedData = json_decode($rawData);
                return new Cart($parsedData->cartId, $parsedData->_items);
            }
            else {
                $cart = new Cart($cartId);
                $this->saveCart($cart);
                return $cart;
            }
        }

    }

}