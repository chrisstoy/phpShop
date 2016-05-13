<?php

namespace Server
{
    /**
     * Define the interface a Cart Data Source needs to implement
     */
    interface ICartDataSource
    {
        public function getCart($cartId);
        public function getLastCart();
        public function saveCart($cart);
    }
}