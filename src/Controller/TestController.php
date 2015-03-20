<?php

namespace Maxc\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
* TestController
*/
class TestController
{

	public function hello(Application $app, Request $request, $name)
	{
		$app['title'] = 'Hello';
		return $app['template']->render('Test/hello.html.php', array('name' => $name));
	}

	public function index(Application $app)
	{
		return $app['template']->render('Test/index.html.php');
	}

}