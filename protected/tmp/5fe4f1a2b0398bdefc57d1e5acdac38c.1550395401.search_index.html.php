<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <title>搜索</title>
        <style>
            #SearchTitle{
                color:black;
            }
            #keywords{
                width: 525px;
                position:relative;
            }
            .cc{
                width:18cm;
                margin:0 auto;
            }
            #BG::before{
            content: '';
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url("http://api.dujin.org/bing/1920.php") 0 / cover fixed;
            opacity:0.5;
            }
            .card{
                margin-bottom: 4rem;
                overflow: hidden;
                display: block;
                    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
                    border-radius: 4px;
                    transition: .2s ease-out .0s;
                    color: #7a8e97;
                    background: #fff;
                    position: relative;
                    border: 1px solid rgba(0, 0, 0, 0.15);
                }
            #show-card{
                opacity: 0.8;
                width: 24rem;
                height: 14.8rem;
                border: 1px solid rgba(0, 0, 0, 0.15);
                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
                border-radius: 4px;
                display: block;
                color: #7a8e97;
                background: #fff;
            }
            #show-card:hover {
                box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 100px;
            }
            .col-md-4{
                display: flex; 
                justify-content: center;
                align-items: center;
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
            .text-long{
                width: 23rem; 
                display: -webkit-box; 
                -webkit-line-clamp: 5; 
                -webkit-box-orient: vertical; 
                overflow: hidden;
                white-space: pre-line;
            }
            #dis-none{
                opacity:0.8;
                width:50rem;
                height: 10rem;
                border: 1px solid rgba(0, 0, 0, 0.15);
                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
                border-radius: 4px;
                color: #7a8e97;
                background: #fff;
                display: flex; 
                justify-content: center; 
                align-items: center;
            }
        </style>
    </head>
    <body>
        <div id="BG">
        <div style="background-color: black; color:white;">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="background-color:black;opacity:0.6;">
                            <a class="navbar-brand" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>">ATSAST BLOG</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto"></ul>
                            <ul class="navbar-nav">
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
                <div class = "col-md-12"><br></div> 
        <div class = "row">
            <div class = "col-md-12">
        <div class = "card" style="opacity:0.5;">
            <div class = "card-body">
            <h1 class="text-center">Search</h1>
            <p class="text-center" id="SearchTitle"><small>You can search anything you want……</small></p>
            <div class = "cc">
        <form class="form-inline" method="get" id = "searchform"action="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/search/result">
        <div class="form-group">
            <label class="sr-only" for="keywords">Search</label>
            <input type="text" class="form-control" id="keywords" placeholder="Qualis artifex pereo" name="keywords">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    </body>
</html>
<script>
    function Highlight(str){
        var key  = $("#keywords").val();
        var patt=new RegExp(key ,'igm');
        str=str.replace(patt,"<strong>$1</strong>");
        document.write(str);
        }
</script>