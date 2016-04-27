<?php

namespace Controllers
{
    class BaseController
    {
		private static $blade;
		
		static function init() {
			// use the Laravel/Blade templating engine
        	$views = SYSTEM_PATH.'client/views';
        	$viewsCache = SYSTEM_PATH.'.cache';
        	self::$blade = new \Philo\Blade\Blade($views, $viewsCache);
		}

        protected function result($view, $model) {
           return self::$blade->view()->make($view, $model )->render();
        }
    }

	BaseController::init();
}

