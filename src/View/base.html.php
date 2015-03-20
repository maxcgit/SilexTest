<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= isset($app['title']) ? $app['title'] : 'Welcome' ?></title>
        <meta name="description" content="">
        <meta name="keyword" content="">
        <!-- <link rel="icon" type="image/x-icon" href="" /> -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.1/slate/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' rel='stylesheet' type='text/css'>
         <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?=$link('home')?>"><?= $app['sitename'] ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?=$link('home')?>">Home</a></li>
                <li><a href="<?=$link('hello', array('name'=>'Fog'))?>">Hello</a></li>
                <li><a href="<?=$link('blog')?>">Blog</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
        <?= isset($content) ? $content : 'No content!' ?>
        </div>

        <div id="footer" class="well well-sm">
        <div class="container">
            <ul class="list-inline pull-left text-muted">
                <li><i class="fa fa-copyright"></i> <?=date('Y')?> <?= $app['sitename'] ?></li>
                <li>All Rights Reserved</li>
            </ul>
            <ul class="list-inline pull-right">
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
        </div>

        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>       
    </body>
</html>