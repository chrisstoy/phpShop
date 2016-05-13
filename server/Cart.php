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

            $this->addItem($listItem);
        }

        /**
         * Add the item to the cart
         */
        public function addItem($listItem) {
            array_push($this->_items, $listItem);
        }

        /**
         * Removes the specified item from the cart, and returns that item.
         */
        public function removeItem($itemId) {
            for ( $ii = 0; $ii < count($this->_items); $ii++) {
                $item = $this->_items[$ii];
                if ( $item->itemId == $itemId ) {
                    array_splice($this->_items, $ii, 1);
                    return $item;
                }
            }
            return null;
        }

        /**
         * Clears all items from the cart
         */
        public function clear() {
            $this->_items = array();
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