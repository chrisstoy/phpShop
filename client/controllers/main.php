<?php

namespace Controllers
{
    /**
     * Main page display
     */
    class main extends BaseController
    {
        /**
         * Create the model for the Main index page
         */
        public function index() {

            $ProductsCollection = new \Server\ProductsCollection();
            $products = $ProductsCollection->getAllProducts();
            shuffle($products);

            $model = [
                'title' => "Main-Index",
                'products' => $products
            ];

            return $this->result('main-index', $model);
        }
    }

}