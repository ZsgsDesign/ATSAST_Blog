<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <title>ATSAST Blog</title>
        <style>
            .card{
                width: 25rem;
                height: 40.5rem;
                border: 1px solid rgba(0, 0, 0, 0.15);
                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
                border-radius: 4px;
                display: block;
                color: #7a8e97;
                background: #fff;
            }
            .card:hover {
                box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 100px;
            }
            .col-md-4{
                height:50rem;
                display: flex; 
                justify-content: center; 
                align-items: center;
            }
            .text-long{
                width: 23rem; 
                display: -webkit-box; 
                -webkit-line-clamp: 18; 
                -webkit-box-orient: vertical; 
                overflow: hidden;
                white-space: pre-line;
            }
            #gravatar-nav{
                width:60px;
                height:60px;
                border-radius:60px;
            }
            #nav-row{
                display: flex; 
                justify-content: center; 
                align-items: center;
            }
        </style>
    </head>
    <body>
    <div style="background-color: black; color:white;">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="background-color:black;">
            <a class="navbar-brand" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>">ATSAST BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/search/">搜索</a>
            </li>
            <?php if ($islogin) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($greeting, ENT_QUOTES, "UTF-8"); ?>！<?php echo htmlspecialchars($user_name, ENT_QUOTES, "UTF-8"); ?></a>
                <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                <div class="row" id="nav-row">
                    <img src="<?php echo htmlspecialchars($gravatar, ENT_QUOTES, "UTF-8"); ?>" class="img-thumbnail" id="gravatar-nav" />
                    <h6>&nbsp&nbsp&nbsp<?php echo htmlspecialchars($user_name, ENT_QUOTES, "UTF-8"); ?></h6>
                </div>
                </div>
                <a class="dropdown-item" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/admin/" style>个人主页</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/account/logout">登出</a>
            </div>
            </li>
            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/account/">登录 / 注册</a>
            </li>
            <?php endif; ?>
            </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php if(!empty($art_shown)){ $_foreach_art_counter = 0; $_foreach_art_total = count($art_shown);?><?php foreach( $art_shown as $art ) : ?><?php $_foreach_art_index = $_foreach_art_counter;$_foreach_art_iteration = $_foreach_art_counter + 1;$_foreach_art_first = ($_foreach_art_counter == 0);$_foreach_art_last = ($_foreach_art_counter == $_foreach_art_total - 1);$_foreach_art_counter++;?>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo htmlspecialchars($art["title"], ENT_QUOTES, "UTF-8"); ?></h3>
                    <blockquote class="blockquote text-right">
                        <p class="mb-0"><?php echo htmlspecialchars($art["author"], ENT_QUOTES, "UTF-8"); ?></p>
                        <footer class="blockquote-footer">发表于<cite title="Source Title"><?php echo htmlspecialchars($art["time"], ENT_QUOTES, "UTF-8"); ?></cite></footer>
                      </blockquote>
                  </div>
                  <div class="card-body">
                      <p class="text-long"><?php echo htmlspecialchars($art["text"], ENT_QUOTES, "UTF-8"); ?></p>
                      <a href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/page/article?aid=<?php echo htmlspecialchars($art['aid'], ENT_QUOTES, "UTF-8"); ?>&uid=<?php echo htmlspecialchars($art['uid'], ENT_QUOTES, "UTF-8"); ?>" style="text-align:center;">阅读更多</a>
                  </div>
            </div>
            </div>
           <?php endforeach; }?> 
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    </body>
</html>
