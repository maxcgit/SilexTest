<?php

namespace Maxc\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
* BlogController
*/
class BlogController extends Controller
{

	public function getViewPath()
	{
		return 'Blog/';
	}

	public function blog()
	{
		$this->app['title'] = 'Blog';
		return $this->render('blog.html.php', array(
			'posts' => $this->app['posts']->findAll(),
			'count' => $this->app['posts']->getCount(),
		));
	}

	public function addPost(Request $request)
	{
		$this->app['posts']->addPost($request->get('title'));
		return $this->redirect('blog');
	}

	public function deletePost($id)
	{
		$this->app['posts']->delete($id);
		return $this->redirect('blog');
	}

	public function deleteBlog()
	{
		$this->app['posts']->deleteAll();
		return $this->redirect('blog');
	}

	public function db()
	{
		return $this->render('db.html.php', array('db' => $this->app['posts']->inspect()));
	}

}