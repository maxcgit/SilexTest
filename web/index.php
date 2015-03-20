<?php

require_once __DIR__.'/../vendor/autoload.php';

use Maxc\Controller\BlogController;

$app = new Silex\Application();

/**
* Config
*/
$app['debug'] = true;
$app['layout'] = 'base.html.php';
$app['view_path'] = __DIR__.'/../src/View/';
$app['sitename'] = 'Silex';

/**
* Services
*/
$app->register(new Silex\Provider\UrlGeneratorServiceProvider);
$app->register(new Silex\Provider\ServiceControllerServiceProvider);
$app->register(new Ivoba\Silex\RedBeanServiceProvider(), array('db.options' => array('dsn' => 'sqlite:../db/db.sqlite')));
// $app->register(new Ivoba\Silex\RedBeanServiceProvider(), array('db.options' => array('dsn' => 'mysql:dbname=test;host=127.0.0.1', 'username' => 'root')));

$app['template'] = $app->share(function () use ($app) { return new Maxc\Services\SimplePhpTemplate($app); });
$app['posts'] = $app->share(function () { return new Maxc\Entity\PostRepository; });
$app['blog.controller'] = $app->share(function() use ($app) { return new BlogController($app); });

/**
* Routing
*/
$app->get('/', function () use ($app) { return $app['template']->render('index.html.php'); })->bind('home');
$app->get('/test', 'Maxc\Controller\TestController::index')->bind('test');
$app->get('/hello/{name}', 'Maxc\Controller\TestController::hello')->value('name', 'max')->bind('hello');
//Blog
$blog = $app['controllers_factory'];
$blog->get('/', 'blog.controller:blog')->bind('blog');
$blog->post('/add', 'blog.controller:addPost')->bind('blog_add_post');
$blog->get('/delete/{id}', 'blog.controller:deletePost')->bind('blog_delete')->assert('id', '\d+');
$blog->get('/delete/all', 'blog.controller:deleteBlog')->bind('blog_delete_all');
$blog->get('/db', 'blog.controller:db')->bind('db');
$app->mount('/blog', $blog);

/**
* Error
*/
$app->error(function (\Exception $e, $code) use ($app) {
	$app['title'] = 'Error!';
    return $app['template']->render('error.html.php', array('errors' => $e));
});

/**
* Run
*/
$app['db'];
$app->run();