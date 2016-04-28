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
        public function handle_404($params) {

            $viewModel = [
                'title' => "Not Found",
                'page' => $params->page
            ];

            return $this->result('error', $viewModel);
        }
    }

}