<?php

namespace Maxc\Services;

use Silex\Application;

/**
* SimplePhpTemplate Engine
*/
class SimplePhpTemplate
{
	private $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}
	
	public function render($template, $param = array())
	{
		extract($param);
		$app = $this->app;
		$link = function ($name, $param = array()) use ($app) { 
			return $app['url_generator']->generate($name, $param); 
		};

		ob_start();
		include $app['view_path'].$template;
		$content = ob_get_clean();

		ob_start();
		include $app['view_path'].$app['layout'];
		return ob_get_clean();

		return $content;
	}
}