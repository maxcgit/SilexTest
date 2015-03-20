<?php

namespace Maxc\Controller;

/**
* Controller
*/
abstract class Controller
{

	protected $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function render($file, $param = array())
	{
		return $this->app['template']->render($this->getViewPath().$file, $param);
	}

	public function getViewPath()
	{
		return '';
	}

	public function redirect($name)
	{
		return $this->app->redirect($this->app['url_generator']->generate($name));
	}

}