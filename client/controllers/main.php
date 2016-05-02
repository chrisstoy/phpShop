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
        public function index($params) {

            $ProductsCollection = new \Server\ProductsCollection($GLOBALS['productsDataSource']);
            $products = $ProductsCollection->getAllProducts();
            shuffle($products);

            $viewModel = [
                'title' => "Main-Index",
                'products' => $products
            ];

            return $this->result('main-index', $viewModel);
        }
    }

}