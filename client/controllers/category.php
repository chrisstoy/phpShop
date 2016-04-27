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

            $model = [
                'title' => "Category",
                'category' => $category
            ];

            return $this->result('category-index', $model);
        }
    }

}