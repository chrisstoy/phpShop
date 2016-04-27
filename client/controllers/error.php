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
        public function handleException($exception) {

            $model = [
                'title' => "Error",
                'exception' => $exception
            ];

            return $this->result('error', $model);
        }
    }

}