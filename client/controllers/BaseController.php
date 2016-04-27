<?php

namespace Controllers
{
    /**
     * Base Controller that ties a View and Model together
     * note: This uses the Laravel Blade templating engine.
     * see https://packagist.org/packages/philo/laravel-blade
     */
    class BaseController
    {
		private static $blade;

		/**
		 * Init a new instance of the Blade templating engine to be shared by all Controllers
		 */
		static function init() {
			// use the Laravel/Blade templating engine
        	$views = SYSTEM_PATH.'client/views';
        	$viewsCache = SYSTEM_PATH.'.cache';
        	self::$blade = new \Philo\Blade\Blade($views, $viewsCache);
		}

        /**
         * Common method for rendering a view with a model
         */
        protected function result($view, $viewModel) {
           return self::$blade->view()->make($view, $viewModel )->render();
        }
    }

    // perform the one-time init
	BaseController::init();
}

