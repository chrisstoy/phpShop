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
            $this->loadCart('test');
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
		    $rawData = json_encode($cart);
            $cartFile = SYSTEM_PATH.'.cache'.DS.$cart->cartId.'_cart.json';
            file_put_contents($cartFile, $rawData);
		}
		
		/**
		 * Loads the requested Cart
		 */
		public function loadCart($cartId) {
		
            // todo - for now, use file system to load cart
            $cartFile = SYSTEM_PATH.'.cache'.DS.$cartId.'_cart.json';
            if ( file_exists($cartFile) ) {
                $rawData = file_get_contents($cartFile);
                $parsedData = json_decode($rawData);
                $this->_activeCart = new Cart($parsedData->cartId, $parsedData->_items);
            }
            else {
                $this->_activeCart = new Cart($cartId);
                $this->saveCart($this->_activeCart);
            }
		
		}

    }

}