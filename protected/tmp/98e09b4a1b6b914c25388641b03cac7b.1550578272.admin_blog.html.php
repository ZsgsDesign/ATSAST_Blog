<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <title>个人资料</title>
        <style type="text/css"></style>
        <style>
            #scroll::-webkit-scrollbar { width: 0 !important }
            #scroll-small::-webkit-scrollbar { width: 0 !important }
            article, aside, audio, body, canvas, caption, details, div, figure, footer, header, hgroup, html, iframe, img, mark, menu, nav, object, section, span, summary, table, tbody, td, tfoot, thead, tr, video{
                border: 0;
                margin: 0;
                padding: 0;
            }
            div, span, object, iframe, img, table, caption, thead, tbody, tfoot, tr, tr, td, article, aside, canvas, details, figure, hgroup, menu, nav, footer, header, section, summary, mark, audio, video, ul, li, dl, dt, dd{
                border: 0;
                margin: 0;
                padding: 0;
            }
            a, abbr, address, b, blockquote, cit, code, dd, del, dfn, dl, dt, em, fieldset, h1, h2, h3, h4, h5, h6, hr, i, ins, label, legend, li, ol, p, pre, q, samp, small, strong, sub, sup, ul{
                border: 0;
                font-size: 100%;
                vertical-align: baseline;
                margin: 0;
                padding: 0;
            }
            body,html{
                line-height: 1.2;
            }
            *{
                box-sizing: border-box;
            }
            ul{
                list-style-type: none;
                padding: 0;
            }
            li{
                display: block;
            }
            ul,li,ol,dl.dt,dd{
                list-style: none;
            }
            .Showletters{
                top:30%;
                position: relative;
                text-align: center;
                color:snow;
            }
            .aside li{
                height: 35px;
                width: 100%;
                line-height: 40px;
                font-size: 14px;
                color: #4d4d4d;
                padding-left: 16px;
                box-sizing: border-box;
                margin-bottom: 1px;
            }
            .aside{
                background: #fff;
                border-bottom: 1px solid #e9eaeb;
            }
            .aside li.router-link-active{
                background: #27bcf7;
                color: #fff;
            }
            .aside li.router-link-active .font{
                color: #fff;
            }
            .aside li .font{
                color: #4d4d4d;
            }
            .line{
                height: 1px;
                background: #e0e0e0;
            }
            #show-info{
                overflow: hidden;
                display: block;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
                border-radius: 4px;
                transition: .2s ease-out .0s;
                color: #7a8e97;
                background: #fff;
                position: relative;
                border: 1px solid rgba(0, 0, 0, 0.15);
                width:750px;
                margin:0 auto;
                margin-top:16px;

            }
            #nav-info{
                margin-left:150px;
                width:150px;
                margin-top:16px;
                overflow: hidden;
                display: block;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
                border-radius: 4px;
                transition: .2s ease-out .0s;
                color: #7a8e97;
                background: #fff;
                position: relative;
                border: 1px solid rgba(0, 0, 0, 0.15);
                float:left;
            }
            #scroll{
                height:40rem;
                -webkit-overflow-scrolling:auto;
                overflow-y:auto;
                white-space: nowrap;
            }
            #scroll-small{
                height:20rem;
                -webkit-overflow-scrolling:auto;
                overflow-y:auto;
                white-space: nowrap;
            }
            #new-button{
                float: right;
                margin-bottom: 10px;
            }
            #edit-row{
                margin-left: 12px;
            }
            #gravatar-nav{
                width:60px;
                height:60px;
                border-radius:60px;
            }
            #row-nav{
                display: flex; 
                justify-content: center; 
                align-items: center;
            }
            .text-long{
                display: -webkit-box; 
                -webkit-line-clamp: 4; 
                -webkit-box-orient: vertical; 
                overflow: hidden;
                white-space: pre-line;
            }
        </style>
    </head>
    <body>
        <div style="background-color: black; color:white;">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="background-color:black;opacity: 0.6;">
                <a class="navbar-brand" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>">ATSAST BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/search/result" method="get" class="form-inline my-2 my-lg-0 mundb-inline">
                                <input class="form-control mr-sm-2 atsast-searchBox" name="keywords" type="search" placeholder="搜索" aria-label="搜索">
                            </form>
                        </li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($greeting, ENT_QUOTES, "UTF-8"); ?>！<?php echo htmlspecialchars($user_name, ENT_QUOTES, "UTF-8"); ?></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-header">
                                            <div class="row" id="row-nav">
                                                <img src="<?php echo htmlspecialchars($gravatar, ENT_QUOTES, "UTF-8"); ?>" class="img-thumbnail" id="gravatar-nav" />
                                                <h6>&nbsp&nbsp&nbsp<?php echo htmlspecialchars($user_name, ENT_QUOTES, "UTF-8"); ?></h6>
                                            </div>
                                            </div>
                                <a class="dropdown-item text-danger" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/account/logout">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>            
        </div>
                <ul class="aside"id="nav-info">
                    <li class="router-link">
                        <a class="font" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/admin/">个人资料</a>
                    </li>
                    <li class="router-link">
                        <a class="font">关注 / 粉丝</a>
                    </li>
                    <li class="router-link">
                        <a class="font">收藏</a>
                    </li>
                    <li class="router-link-active">
                            <a class="font" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/admin/blog">博客管理</a>
                    </li>
                </ul>
            <div class="card" id="show-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs nav-justified nav-tabs-material" id="actTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="article-tab" data-toggle="tab" href="#article" role="tab" aria-controls="article" aria-selected="true">文章</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="false">分类</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment" aria-selected="false">评论</a>
                        </li>
                        </ul>
                    </div>
                    <div class = "card-body">
                            <div class="tab-content" id="actTabContent">
                                    <div class="tab-pane active" id="article" role="tabpanel" aria-labelledby="article-tab">
                                        <?php if (count($art_this_blog)==0) : ?>
                                        <h3><br>您还没有写过一篇文章哦</h3>
                                        <?php else : ?>
                                        <div class="container" id="scroll">
                                            <?php if(!empty($art_this_blog)){ $_foreach_art_counter = 0; $_foreach_art_total = count($art_this_blog);?><?php foreach( $art_this_blog as $art ) : ?><?php $_foreach_art_index = $_foreach_art_counter;$_foreach_art_iteration = $_foreach_art_counter + 1;$_foreach_art_first = ($_foreach_art_counter == 0);$_foreach_art_last = ($_foreach_art_counter == $_foreach_art_total - 1);$_foreach_art_counter++;?>
                                            <div style="margin-left:10px;margin-top: 16px;">
                                                <h3 class="text-left"><a href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/page/article?aid=<?php echo htmlspecialchars($art["aid"], ENT_QUOTES, "UTF-8"); ?>&?uid=<?php echo htmlspecialchars($user_info["uid"], ENT_QUOTES, "UTF-8"); ?>' style="color:#FB7299;"><?php echo htmlspecialchars($art["title"], ENT_QUOTES, "UTF-8"); ?></a></h3>
                                                <p class="text-long"><?php echo htmlspecialchars($art["text"], ENT_QUOTES, "UTF-8"); ?></p>
                                                <p class="text-right"><small>修改于<?php echo htmlspecialchars($art["time"], ENT_QUOTES, "UTF-8"); ?> / <?php if ($art["isdraft"] == 0) : ?> 已发表 <?php else : ?> 草稿 <?php endif; ?></small></p>
                                                <div class="row" id="edit-row">
                                                <a class="btn btn-primary" href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/admin/edit?aid=<?php echo htmlspecialchars($art["aid"], ENT_QUOTES, "UTF-8"); ?>'>修改</a>
                                                <button class="btn btn-danger" id="deleteart" value="<?php echo htmlspecialchars($art['aid'], ENT_QUOTES, "UTF-8"); ?>" onclick="delart()">删除</button>
                                                <?php if ($art["isdraft"]==1) : ?>
                                                <a class="btn btn-secondary" href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/ajax/postart?aid=<?php echo htmlspecialchars($art["aid"], ENT_QUOTES, "UTF-8"); ?>'>发布</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                            <?php endforeach; }?>
                                        </div>
                                        <?php endif; ?>
                                        <a class="btn btn-outline-primary" href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/admin/edit?aid=0' id="new-button">撰写新文章</a>
                                    </div>
                                    <div class="tab-pane" id="category" role="tabpanel" aria-labelledby="category-tab">
                                        <h3 class="text-right" style="color:gray;"><strong>你已添加的类别</strong></h3>
                                        <div id="scroll">
                                        <?php if(!empty($cate_this_usr)){ $_foreach_cate_counter = 0; $_foreach_cate_total = count($cate_this_usr);?><?php foreach( $cate_this_usr as $cate ) : ?><?php $_foreach_cate_index = $_foreach_cate_counter;$_foreach_cate_iteration = $_foreach_cate_counter + 1;$_foreach_cate_first = ($_foreach_cate_counter == 0);$_foreach_cate_last = ($_foreach_cate_counter == $_foreach_cate_total - 1);$_foreach_cate_counter++;?>
                                        <button class="btn btn-primary" for="category" data-toggle="collapse" data-target="#collapse-category<?php echo htmlspecialchars($cate, ENT_QUOTES, "UTF-8"); ?>" aria-expanded="false" aria-controls="collapse-search" style="color:#FB7299"><?php echo htmlspecialchars($cate, ENT_QUOTES, "UTF-8"); ?>(<?php echo htmlspecialchars($article_count[$cate], ENT_QUOTES, "UTF-8"); ?>)</button>
                                        <span id="collapse-category<?php echo htmlspecialchars($cate, ENT_QUOTES, "UTF-8"); ?>" class="collapse">
                                            <?php if ($article_count[$cate] == 0) : ?>
                                            <div class="card" style="height:3rem;width:40rem;margin-top:10px;margin-bottom:10px;"><p class="text-center" style="color:gray;margin-top:1rem;">该分类还没有文章</p></div>
                                            <?php else : ?>
                                                <div class="card" id="scroll" style="width:40rem;height:20rem;">
                                                    <?php if(!empty($article_incate[$cate])){ $_foreach_atc_counter = 0; $_foreach_atc_total = count($article_incate[$cate]);?><?php foreach( $article_incate[$cate] as $atc ) : ?><?php $_foreach_atc_index = $_foreach_atc_counter;$_foreach_atc_iteration = $_foreach_atc_counter + 1;$_foreach_atc_first = ($_foreach_atc_counter == 0);$_foreach_atc_last = ($_foreach_atc_counter == $_foreach_atc_total - 1);$_foreach_atc_counter++;?>
                                                    <div style="margin-left:10px;margin-top: 16px;margin-right:16px;">
                                                            <h3 class="text-left"><a href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/page/article?aid=<?php echo htmlspecialchars($atc["aid"], ENT_QUOTES, "UTF-8"); ?>&?uid=<?php echo htmlspecialchars($user_info["uid"], ENT_QUOTES, "UTF-8"); ?>' style="color:#FB7299;"><?php echo htmlspecialchars($atc["title"], ENT_QUOTES, "UTF-8"); ?></a></h3>
                                                            <p class="text-long"><?php echo htmlspecialchars($atc["text"], ENT_QUOTES, "UTF-8"); ?></p>
                                                            <p class="text-right"><small>修改于<?php echo htmlspecialchars($atc["time"], ENT_QUOTES, "UTF-8"); ?> / <?php if ($atc["isdraft"] == 0) : ?> 已发表 <?php else : ?> 草稿 <?php endif; ?></small></p>
                                                            <button class="btn btn-primary" onclick="changecate()" style="float:right;">更改分类</button>
                                                        </div>
                                                        <?php endforeach; }?>
                                                    </div>
                                                    <?php endif; ?>
                                        </span>
                                        <?php endforeach; }?></div>
                                        <div class="button-group" role="group">
                                                <button class="btn btn-outline-danger" for="del" data-toggle="collapse" data-target="#input-del" style="float:left;margin-bottom:10px;" aria-expanded="false">删除分类</button>
                                                <span id="input-del" class="collapse">
                                                    <div class="form-inline" method="post" >
                                                        <label for="catedel" >输入分类：</label>
                                                        <input class="form-control" id="catedel" name="catedel" style="width:18rem;">
                                                        <button type="submit" cllass="form-control" onclick="delcate()" class="btn btn-primary">提交</button>
                                                    </div>
                                                </span>
                                        <button class="btn btn-outline-primary" for="new" data-toggle="collapse" data-target="#input-cate" id="new-button" aria-expanded="false">添加新分类</button>
                                        <span id="input-cate" class="collapse">
                                            <div class="form-inline" method="post">
                                                <input class="form-control" id="catenew" name="catenew" style="width:18rem;">
                                                <button type="submit" cllass="form-control" onclick="neocate()" class="btn btn-primary">提交</button>
                                            </div>
                                        </span>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                                            <h3 class="text-right"><strong>待审核评论</strong></h3>
                                            <?php if (count($com_this_user)==0) : ?>
                                            <p class="text-center"><br>很棒！你已经处理完所有评论了。</p>
                                            <?php else : ?>
                                            <ul class="list-group" id="scroll-small">
                                                <?php if(!empty($com_this_user)){ $_foreach_com_counter = 0; $_foreach_com_total = count($com_this_user);?><?php foreach( $com_this_user as $com ) : ?><?php $_foreach_com_index = $_foreach_com_counter;$_foreach_com_iteration = $_foreach_com_counter + 1;$_foreach_com_first = ($_foreach_com_counter == 0);$_foreach_com_last = ($_foreach_com_counter == $_foreach_com_total - 1);$_foreach_com_counter++;?>
                                                <a class="list-group-item">
                                                    <div class="bmd-list-group-col">
                                                    <h4 class="list-group-item-heading"><strong><?php echo htmlspecialchars($com["author"], ENT_QUOTES, "UTF-8"); ?></strong></h4>
                                                    <p class="list-group-item-text"><?php echo htmlspecialchars($com["text"], ENT_QUOTES, "UTF-8"); ?></p>
                                                    <p class="list-group-item-text text-right"><small>评论于<?php echo htmlspecialchars($com["time"], ENT_QUOTES, "UTF-8"); ?></small></p>
                                                    </div>
                                                    </a>
                                                    <div class="row" id="edit-row">
                                                    <a class="btn btn-primary" href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/ajax/comment?cid=<?php echo htmlspecialchars($com["cid"], ENT_QUOTES, "UTF-8"); ?>&action=post'>通过</a>
                                                    <a class="btn btn-danger" href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/ajax/comment?cid=<?php echo htmlspecialchars($com["cid"], ENT_QUOTES, "UTF-8"); ?>&action=delete'>删除</a>
                                                </div>
                                                <?php endforeach; }?>
                                            </ul>
                                            <?php endif; ?>
                                            <h3 class="text-right"><strong>已通过评论</strong></h3>
                                            <?php if (count($com_user_added)==0) : ?>
                                            <p class="text-center"><br>啊哦，似乎还没有人给你留言呢……</p>
                                            <?php else : ?>
                                            <ul class="list-group" id="scroll-small">
                                                <?php if(!empty($com_user_added)){ $_foreach_coma_counter = 0; $_foreach_coma_total = count($com_user_added);?><?php foreach( $com_user_added as $coma ) : ?><?php $_foreach_coma_index = $_foreach_coma_counter;$_foreach_coma_iteration = $_foreach_coma_counter + 1;$_foreach_coma_first = ($_foreach_coma_counter == 0);$_foreach_coma_last = ($_foreach_coma_counter == $_foreach_coma_total - 1);$_foreach_coma_counter++;?>
                                                <a class="list-group-item" href='http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/page/?aid=<?php echo htmlspecialchars($coma["ret_article"], ENT_QUOTES, "UTF-8"); ?>&?uid=<?php echo htmlspecialchars($user_info["uid"], ENT_QUOTES, "UTF-8"); ?>'>
                                                    <div class="bmd-list-group-col">
                                                    <h4 class="list-group-item-heading"><?php echo htmlspecialchars($coma["author"], ENT_QUOTES, "UTF-8"); ?></h4>
                                                    <p class="list-group-item-text"><?php echo htmlspecialchars($coma["text"], ENT_QUOTES, "UTF-8"); ?></p>
                                                    <p class="list-group-item-text text-right"><small>———评论于<?php echo htmlspecialchars($coma["time"], ENT_QUOTES, "UTF-8"); ?></small></p>
                                                    </div>
                                                    </a>
                                                <?php endforeach; }?>
                                            </ul>
                                            <?php endif; ?>
                                    </div>
                            </div>   
                    </div>
            </div>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    </body>
    <script type="text/javascript">
        function delart(){
            var con = confirm("你确定要删除这篇文章？该操作不可逆！");
            if(con==true){
            $.post("http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/ajax/deletearticle",{
                aid:$("#deleteart").val()
            },function(result){
                location.reload();
            });
            }
        }
        function neocate(){
            $.post("http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>/ajax/NeoCate",{
                cate:$("#catenew").val()
            },function(result){
                result = JSON.parse(JSON.stringify(result));
                alert("添加成功");
                location.reload();
            });
        }
        function changecate(){
    
        }
        function delcate(){
    
        }
    </script>
</html>