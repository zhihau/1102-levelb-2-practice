﻿<?php include_once "base.php"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>
<style>
	.pop{
		background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;
	}
	.pop div{
		font-weight:bold;
		color:skyblue;
	}
</style>
<body>
	<div id="all">
    	<?php include "front/header.php"?>
        <div id="mm">
        	<div class="hal" id="lef">
            	                	    <a class="blo" href="?do=po">分類網誌</a>
               	                     	    <a class="blo" href="?do=news">最新文章管理</a>
               	                     	    <a class="blo" href="?do=admin">帳號管理</a>
               	                     	    <a class="blo" href="?do=know">講座管理</a>
               	                     	    <a class="blo" href="?do=que">問卷管理</a>
               	                 </div>
            <div class="hal" id="main">
            	
				<?php
				$do=$_GET['do']??'home';
				$file='back/'.$do.'.php';
				if(file_exists($file)){
					include $file;
				}else{
					include 'back/home.php';
				}
				?>
            </div>
        </div>
		<?php include "front/footer.php"?>
       
    </div>

</body></html>