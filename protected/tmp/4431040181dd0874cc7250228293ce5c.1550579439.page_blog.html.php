<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <style>
            #all::-webkit-scrollbar { width: 0 !important }
            #blog-nav{
                width:71%;
                margin:0 auto;
                margin-top:16px;
                background-color:rgba(251, 114, 153, 0.9);
            }
            #side-nav{
                width:10rem;
                margin:0 auto;
                margin-top:30px;
            }
            #main-card{
                height:45rem;
                margin-top:30px;
            }
            #cutdown{
                display: -webkit-box; 
                -webkit-line-clamp: 8; 
                -webkit-box-orient: vertical; 
                overflow: hidden;
                white-space: pre-line;
            }
            #all{
                height:45rem;
                -webkit-overflow-scrolling:auto;
                overflow-y:auto;
                white-space: nowrap;
            }
            #text-show{
                width:95%;
                margin-left:20px;
                margin-top:16px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
        <div class="col-md-12">
            <div class="card" id="blog-nav">
                <a class="navbar-brand" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>" style="margin-left:16px;margin-top:16px;color:#fff;"><h1>ATSAST BLOG</h1></a>
                <div>
                <h5 style="margin-left:16px;margin-bottom: 16px;margin-top:6px;float:left;color:#fff;"><?php echo htmlspecialchars($blog_user["username"], ENT_QUOTES, "UTF-8"); ?>的博客</h5>
                <?php if ($blog_user["uid"]!=$_SESSION["UID"]) : ?>
                <button class="btn btn-outline-secondary" style="float:right;margin-right: 16px;margin-bottom:16px;">关注</button>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="card" id="side-nav">
                        <ul class="nav nav-tabs nav-tabs-material flex-column" id="actTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="index-tab" data-toggle="tab" href="#index" role="tab" aria-controls="index" aria-selected="true">首页</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="false">
                                        分类
                                        <button class="btn dropdown-toggle bmd-btn-icon" style="float:right;" type="button" id="buttonMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></button>
                                        <div class="dropdown-menu" aria-labelledby="buttonMenu1">
                                            <?php if(!empty($category_thisusr)){ $_foreach_cata_counter = 0; $_foreach_cata_total = count($category_thisusr);?><?php foreach( $category_thisusr as $cata ) : ?><?php $_foreach_cata_index = $_foreach_cata_counter;$_foreach_cata_iteration = $_foreach_cata_counter + 1;$_foreach_cata_first = ($_foreach_cata_counter == 0);$_foreach_cata_last = ($_foreach_cata_counter == $_foreach_cata_total - 1);$_foreach_cata_counter++;?> 
                                            <button class="dropdown-item" type="button" onclick="window.location.href='blog?uid=<?php echo htmlspecialchars($blog_uid, ENT_QUOTES, "UTF-8"); ?>&cata=<?php echo htmlspecialchars($cata, ENT_QUOTES, "UTF-8"); ?>'"><?php echo htmlspecialchars($cata, ENT_QUOTES, "UTF-8"); ?></button>
                                            <?php endforeach; }?>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">全部文章</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" id="introduction-tab" data-toggle="tab" href="#introduction" role="tab" aria-controls="introduction" aria-selected="false">简介</a>
                                </li>
                        </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card" id="main-card">
                        <div class="tab-content" id="actTabContent">
                                <div class="tab-pane active" id="index" role="tabpanel" aria-labelledby="index-tab">
                                    <h1 class="text-center" style="margin-top: 12px;">Hello,world!</h1>
                                    <img src="http://www.brethland.com/yui01.jpg" style="width:5cm;margin-bottom: 10px;">
                                </div>
                                <div class="tab-pane" id="category" role="tabpanel" aria-labelledby="category-tab">
                                </div>
                                <div class="tab-pane" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <?php if (count($art_show)==0) : ?>
                                    <h2 class="text-center" style="color:grey;margin-top:20px;">这位用户还没发表过文章呢……</h2>
                                    <?php else : ?>
                                    <?php if(!empty($art_show)){ $_foreach_art_counter = 0; $_foreach_art_total = count($art_show);?><?php foreach( $art_show as $art ) : ?><?php $_foreach_art_index = $_foreach_art_counter;$_foreach_art_iteration = $_foreach_art_counter + 1;$_foreach_art_first = ($_foreach_art_counter == 0);$_foreach_art_last = ($_foreach_art_counter == $_foreach_art_total - 1);$_foreach_art_counter++;?>
                                    <div class="container" id="text-show">
                                    <h3><strong><?php echo htmlspecialchars($art["title"], ENT_QUOTES, "UTF-8"); ?></strong></h3>
                                    <br>
                                    <p id="cutdown"><?php echo htmlspecialchars($art["text"], ENT_QUOTES, "UTF-8"); ?></p>
                                    <p class="text-right"><small><?php echo htmlspecialchars($art["time"], ENT_QUOTES, "UTF-8"); ?> / <a href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/page/article?aid=<?php echo htmlspecialchars($art['aid'], ENT_QUOTES, "UTF-8"); ?>&uid=<?php echo htmlspecialchars($blog_uid, ENT_QUOTES, "UTF-8"); ?>">阅读</a></small></p>
                                    </div>
                                    <?php endforeach; }?>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane" id="introduction" role="tabpanel" aria-labelledby="introduction-tab">
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