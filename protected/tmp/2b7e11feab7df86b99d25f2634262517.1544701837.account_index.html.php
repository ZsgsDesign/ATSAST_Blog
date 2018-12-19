<?php if(!class_exists("View", false)) exit("no direct access allowed");?><style>
    body{
        height:100vh;
        width:100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        margin:0;
    }
    h1{
        color:#7a8e97;
    }
</style>

<h1>用户中心</h1>
<p>IP: <?php echo htmlspecialchars($ip, ENT_QUOTES, "UTF-8"); ?> </p>