<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <title>ATSAST Blog</title>
        <style>
            .container-fluid{
                width: 100%;
                height: 100%;
                position: absolute;
                background: url("http://api.dujin.org/bing/1920.php") 0 / cover fixed;
            }
            .Showletters{
                position: relative;
                top:30%;
                text-align: center;
                color:snow;
            }
            li a:hover {
                background-color:#111;
            }
            .navbar-brand:hover{
                background-color:#111;
            }
        </style>
    </head>
    <body>
    <div style="background-color: black; color:white;">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="background-color:black;opacity: 0.6;">
            <a class="navbar-brand" href="#">ATSAST BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="https://blog.winter.mundb.xyz/search/">搜索</a>
            </li>
            <?php if ($islogin) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($greeting, ENT_QUOTES, "UTF-8"); ?>！</a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" style>个人主页</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="https://blog.winter.mundb.xyz/account/logout">登出</a>
            </div>
            </li>
            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="https://www.sastblog.com/account/">登录 / 注册</a>
            </li>
            <?php endif; ?>
            </ul>
            </div>
        </nav>
    </div>
        <div class =  "container-fluid">
            <h1 class="Showletters">ATSAST Blog  测试版<br><br><br>
                    <button type="button" class="btn btn-outline-light btn-primary btn-lg">试试手气</button><br>
                    
            </h1>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    </body>
</html>
