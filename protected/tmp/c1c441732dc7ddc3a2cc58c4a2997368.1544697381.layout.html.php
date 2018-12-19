<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FlashPHP</title>
    <!-- Necessarily Declarations -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
</head>

<body>
    <?php include $_view_obj->compile("navbar.html"); ?>
    <?php include $_view_obj->compile($__template_file); ?>
    <?php include $_view_obj->compile("footer.html"); ?>
</body>

</html>