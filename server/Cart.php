<?php

namespace Server {

    /**
     * Represents a Cart containing products to purchase
     */
    class Cart
    {
        public $cartId;

        function __construct($cartId, $items=[]) {
            $this->cartId = $cartId;
            $this->_items = $items;
        }

        /**
         * Adds a product to the cart
         */
        public function addProduct($product)
        {
            $listItem = [
                'itemId' => ShopUtils::gen_uuid(),
                'productId' => $product->id,
                'price' => $product->price
            ];

            array_push($this->_items, $listItem);
        }

        /**
         * Returns the number of items in the cart
         */
        public function numberOfItemsInCart() {
            return count($this->_items);
        }

        /**
         * Returns how much it will cost to buy everything in the cart
         */
        public function cartValue() {
            $total = 0;
            foreach( $this->_items as $item) {
                $total += $item->price;
            }
            return $total;
        }


    }


}