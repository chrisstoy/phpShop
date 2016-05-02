<?php

namespace Server
{
    /**
     * Define the interface a Products Data Source needs to implement
     */
    interface IProductsDataSource
    {
        public function getAllProducts();
        public function getProduct($productId);
        public function getProductsWithCategory($categories);
        public function getAllCategories();
    }
}