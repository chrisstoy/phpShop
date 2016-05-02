<?php

namespace Controllers
{
    /**
     * Product Display Page page display
     */
    class pdp extends BaseController
    {
        /**
         * Create the model for the Main index page
         */
        public function index($params) {

            $productId = isset($params->productId) ? $params->productId : null;

            $productsCollection = new \Server\ProductsCollection($GLOBALS['productsDataSource']);
            $product = $productsCollection->getProduct($productId);

            if ( isset($product) ) {

                $viewModel = [
                    'title' => $product->name,
                    'product' => $product,
                    'listPrice' => money_format('$%i', $product->price)
                ];

                return $this->result('pdp-index', $viewModel);
            }
            else {
                // product doesn't exist in the database.
                return $this->result('pdp-not-found', [ 'title' => 'Product Not Found', 'productId' => $productId ]);
            }
        }
    }

}