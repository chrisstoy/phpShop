<?php

namespace Server
{
    /**
     * Manages access to the carts
     */
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
		    $this->_dataSource->saveCart($cart);
		}
		
		/**
		 * Loads the requested Cart
		 */
		public function getCart($cartId) {
            return $this->_dataSource->getCart($cartId);
        }

    }

}