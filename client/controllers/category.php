<?php

namespace Controllers
{
    /**
     * Category display
     */
    class category extends BaseController
    {
        /**
         * Create the model for the Category index page
         */
        public function index($category=null) {

            $productsCollection = new \Server\ProductsCollection();

            $categories = $productsCollection->getAllCategories();
            $selectCat = (isset($category) ? $category : $categories[0]);
            $products = $productsCollection->getProductsWithCategory([$selectCat]);

            $viewModel = [
                'title' => "Category",
                'category' => $selectCat,
                'categories' => $categories,
                'products' => $products
            ];

            return $this->result('category-index', $viewModel);
        }
    }

}