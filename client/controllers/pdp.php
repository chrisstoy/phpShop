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
        public function index($productId=null) {

            $model = [
                'title' => "Main-Index",
                'productId' => $productId
            ];

            return $this->result('pdp-index', $model);
        }
    }

}