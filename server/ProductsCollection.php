<?php

namespace Server
{
	class ProductsCollection
	{
		
		/* Create a new collection using the passed DataSource */
		function __construct($dataSource=null) {
			
			$this->_dataSource = $dataSource;

			// todo - for testing, fill in some dummy data
			$imageUrl = 'http://placehold.it/150x150?text=Item+Image+Goes+Here';

			$this->_productData = array(
					new Product(ShopUtils::gen_uuid(), 'test1', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test2', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test3', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test4', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test5', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test6', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test7', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test8', 'This is the description of the item. It will happily fit here.', $imageUrl),
					new Product(ShopUtils::gen_uuid(), 'test9', 'This is the description of the item. It will happily fit here.', $imageUrl)
				);
		}
		
		/* Return a list of all available products */
		public function getAllProducts() {
			return $this->_productData;
		}
		
	};

}

