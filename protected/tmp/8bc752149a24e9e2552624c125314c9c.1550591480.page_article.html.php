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
                margin:0 auto;
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
            .container-f{
                width: 100%;
                margin-right: auto;
                margin-left: auto;
            }
            .container-f .card{
                box-shadow: 0 4px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
            }
            .container{
                width: 1200px;
                margin: 0 auto;
                height: 90%;
                margin-top: 16px;
            }
            .container .left_box{
                flex: 0 0 16.66667%;
                max-width: 16.66667%;
                position: relative;
                float:left;
                box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.05);
            }
        </style>
    </head>
    <body>
        <div class="container-f">
            <div class="card" id="blog-nav">
                    <a class="navbar-brand" href="http://<?php echo htmlspecialchars($MAIN_PAGE, ENT_QUOTES, "UTF-8"); ?>" style="margin-left:110px;margin-top:16px;color:#fff;"><h1>ATSAST BLOG</h1></a>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="">
                            <div class="card" id="side-nav">
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a class="nav-link" >Rp12138<!----></a>
                                    </li>
                                </ul>
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