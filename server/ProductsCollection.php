<?php

namespace Server
{
	class ProductsCollection
	{
		/**
		 * Create a new collection using the passed DataSource
		 */
		function __construct($dataSource) {
			
			$this->_dataSource = $dataSource;
		}
		
		/**
		 * Return a list of all available products
		 */
		public function getAllProducts() {
			return $this->_dataSource->getAllProducts();
		}

        /**
         * Returns the requested product, or null if it does not exist
         */
		public function getProduct($productId) {
		    return $this->_dataSource->getProduct($productId);
		}

		/**
		 * Return all products that have the requested category
		 */
		public function getProductsWithCategory($categories) {
		    return $this->_dataSource->getProductsWithCategory($categories);
		}

		/**
		 * Returns array of all categories referenced by Products
		 */
		public function getAllCategories() {
		    return $this->_dataSource->getAllCategories();
		}
		
	};

}

