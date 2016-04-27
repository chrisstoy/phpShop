<?php

namespace Controllers
{
    /**
     * Cart display
     */
    class cart extends BaseController
    {
        /**
         * Create the model for the Main index page
         */
        public function index($cartId=null) {

            $viewModel = [
                'title' => "Cart",
                'cartId' => isset($cartId) ? $cartId : 'NO CART'
            ];

            return $this->result('cart-index', $viewModel);
        }
    }

}