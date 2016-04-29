<?php

namespace Server
{
	class ProductsCollection
	{
		/**
		 * Create a new collection using the passed DataSource
		 */
		function __construct($dataSource=null) {
			
			$this->_dataSource = $dataSource;

            // todo - for now, use file system
			$rawData = file_get_contents(SYSTEM_PATH.'server'.DS.'sample-products.json');
			$parsedData = json_decode($rawData);
			$this->_productData = $parsedData;
		}
		
		/**
		 * Return a list of all available products
		 */
		public function getAllProducts() {
			return $this->_productData;
		}

        /**
         * Returns the requested product, or null if it does not exist
         */
		public function getProduct($productId) {
		    foreach( $this->_productData as $product ) {
		        if ( ShopUtils::uuid_equal($product->id, $productId )) {
		            return $product;
                }
		    }
		    return null;
		}

		/**
		 * Return all products that have the requested category
		 */
		public function getProductsWithCategory($categories) {
            $products = [];

		    foreach( $this->_productData as $product ) {

                $common = array_intersect($product->categories, $categories);
                if ( count($common) > 0 ) {
                    // there was at least one matching category
		            array_push($products, $product);
                }
		    }

		    return $products;
		}

		/**
		 * Returns array of all categories referenced by Products
		 */
		public function getAllCategories() {

		    $categories = [];

		    foreach( $this->_productData as $product ) {
                $categories = array_merge($categories, $product->categories);
		    }

		    return array_unique($categories);
		}
		
	};

}

