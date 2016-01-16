<?php session_start(); ?>

<!doctype html>

<!--This page is designed and built by Yi-Nung Yeh-->

<html>
  <head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style3.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="icon.ico">
    <title>Smart Meal Planner</title>
    <style>
        iframe{
  	   margin:0px 0px;
  	   border:none;
	 }
    </style>
  </head>
  <body>
  
<!--iframe-->

<!--JavaScript-->
<script type="text/javascript">
//??window.onresize????
var debounce = function (func, threshold, execAsap) {  
    var timeout;  
    return function debounced () {  
        var obj = this, args = arguments;  
        function delayed () {  
            if (!execAsap)  
            func.apply(obj, args);  
            timeout = null;  
        };  
        if (timeout)  
            clearTimeout(timeout);  
        else if (execAsap)  
            func.apply(obj, args);  
        timeout = setTimeout(delayed, threshold || 100);  
    };  
}
//?? widow.onresize ?????
window.onresize = debounce( function(){  
    SetCwinHeight();
}, 100, true)
//widow.onresize ?????????
function SetCwinHeight()
{
var viewportwidth;
var viewportheight;
//?????
if (typeof window.innerWidth != "undefined")
 {
      viewportwidth = window.innerWidth;
      viewportheight = window.innerHeight;
 }
else if (typeof document.documentElement.clientWidth != "undefined")
 {
      viewportwidth = document.documentElement.clientWidth;
       viewportheight = document.documentElement.clientHeight;
 }
else
 {
       viewportwidth = document.getElementsByTagName("body")[0].clientWidth;
       viewportheight = document.getElementsByTagName("body")[0].clientHeight;
 }
//?? iframe ??
var imainframe=document.getElementById("mainframe");
imainframe.height = viewportheight;
}

</script>

    <div class="header">
      <div class="container2">
        <a href="team15_index2.php" class="logo-icon" target="mainframe">
          <img src="logo.png" alt="logo">
        </a>
						  
	<ul class="menu">
	  <li><a data-toggle="modal" href="#example"><?php if($_SESSION['login']==TRUE){echo "Log Out";} else {echo "Register/ Log In";}?></a></li>
	  <li><a href="howto.php" target="mainframe">How It Works</a></li>
          <li><a data-toggle='<?php if($_SESSION['login']==TRUE){echo "null";} else {echo "modal";}?>' href='<?php if($_SESSION['login']==TRUE){echo "./recipes.php";} else {echo "#example";}?>' target="mainframe">Get Recipes</a></li>
          <li><a data-toggle='<?php if($_SESSION['login']==TRUE){echo "null";} else {echo "modal";}?>' href='<?php if($_SESSION['login']==TRUE){echo "./recipes_nu.php";} else {echo "#example";}?>' target="mainframe">Nutrition Analysis</a></li>
          <li><a data-toggle='<?php if($_SESSION['login']==TRUE){echo "null";} else {echo "modal";}?>' href='<?php if($_SESSION['login']==TRUE){echo "./recipes_sl.php";} else {echo "#example";}?>' target="mainframe">Weekly Shopping List</a></li>
          <li><a href="aboutus.php" target="mainframe">About Us</a></li>
        </ul>
      </div>
    </div>
	
    <div id="example" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
	<div class="modal-body">
             <div id="mod">
                <div id='fg_membersite_content'>
         	        <iframe src='<?php if($_SESSION['login']==TRUE){echo "./logout.html";} else {echo "./register.html";}?>' scrolling="no" style="text-align:center;"> </iframe>
                </div>
              </div>
        </div>            
    </div>


    <iframe src="team15_index2.php" name="mainframe" width="100%" onload="Javascript:SetCwinHeight()" id="mainframe" style="overflow-y:scroll;overflow-x:hidden;"></iframe>
	
	<script type="text/javascript">
	document.documentElement.style.overflowY = "hidden";
	document.body.scroll = "no";//For Internet Explorer
	</script>
	
	<script src="http://connect.facebook.net/zh_TW/all.js"></script>
	<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
	<!-- AddToAny END -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-modal.js"></script>
    <script src="app3.js"></script>
  </body>
</html>
