<?php

namespace Controllers
{
    /**
     * Cart display
     */
    class error extends BaseController
    {
        /**
         * Handle page errors
         */
        public function handle_404($page) {

            $model = [
                'title' => "Not Found",
                'page' => $page
            ];

            return $this->result('error', $model);
        }
    }

}