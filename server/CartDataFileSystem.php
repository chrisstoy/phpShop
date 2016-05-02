<?php

namespace Server
{
    /**
     * Implement the Data Source interface using a File System
     */
    class CartDataFileSystem implements ICartDataSource
    {
        /**
         * Construct a new instance with the path to the files
         */
        function __construct($rootPath)
        {
            $this->rootPath = $rootPath;
        }

        /**
         * Saves the active cart
         */
        public function saveCart($cart) {

            $rawData = json_encode($cart);
            $cartFile = $this->rootPath.DS.$cart->cartId.'_cart.json';
            file_put_contents($cartFile, $rawData);
        }

        /**
         * Loads the requested Cart. If cart doesn't exist, creates a new one
         */
        public function getCart($cartId) {

            // todo - for now, use file system
            $cartFile = $this->rootPath.DS.$cartId.'_cart.json';
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