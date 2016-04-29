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
                'title' => "Error",
                'params' => $params
            ];

            return $this->result('error', $viewModel);
        }
    }

}