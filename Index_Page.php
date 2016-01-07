<?php session_start(); ?>

<!doctype html>

<!--This page is designed and built by Yi-Nung Yeh-->

<html>
  <head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style3.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Sigmar+One%7CFredericka+the+Great%7CCabin+Sketch%7CDenk+One%7CRacing+Sans+One%7CCarter+One%7CLemon%7CKnewave' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Luckiest+Guy' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="icon.ico">
	<title>Smart Meal Planner</title>
	

  </head>
  <body style="overflow-y:scroll;overflow-x:hidden;">

	<div id="example" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
				<div class="modal-body">
                  <div id="mod">
                    <div id='fg_membersite_content'>
				        <iframe src='<?php if($_SESSION['login']==TRUE){echo "./logout.html";} else {echo "./register.html";}?>' scrolling="no" frameborder="0"> </iframe>
                    </div>
                  </div>
                </div>            
    </div>

    <div class="slider">

      <div class="slide active-slide">
	    <div class="slide-copy">
        <div class="container">
          <div class="row">
		  <div class="col-xs-12">
			<h1 class="title">Smart Meal Planner</h1>
		    <h3 class="subtitle">Your Recipe Recommendation System</h3>
            

            </div>            
          </div>
        </div>
		<a data-toggle="modal" href="#example" class="classname">TRY NOW</a>
      </div>      
      </div>

      <div class="slide slide-feature">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
			<h1 class="title">Enjoy Cooking</h1>
		    <h3 class="subtitle">Afraid of Cooking? Let Us Help!</h3>
			
			



            </div>            
          </div>
        </div>
		<a data-toggle="modal" href="#example" class="classname">TRY NOW</a>
      </div> 

      <div class="slide slide-feature2">
        <div class="container">
          <div class="row">
          <div class="col-xs-12">
          <h1 class="title">Eat Nutritious Food</h1>
		   <h3 class="subtitle">Eat Fresh, Eat Right!</h3>


            </div>            
          </div>
        </div>
		<a data-toggle="modal" href="#example" class="classname">TRY NOW</a>
      </div> 


      <div class="slide slide-feature3">
        <div class="container">
          <div class="row">
          <div class="col-xs-12">
		  <h1 class="title">Happy Life</h1>
		   <h3 class="subtitle">Live Long, Live Strong!</h3>


            </div>            
          </div>
        </div>
		<a data-toggle="modal" href="#example" class="classname">TRY NOW</a>
      </div> 

    </div>

    <div class="slider-nav">
      <ul class="slider-dots">
        <li class="dot active-dot">&bull;</li>
        <li class="dot">&bull;</li>
        <li class="dot">&bull;</li>
        <li class="dot">&bull;</li>
      </ul>
	</div>
	

	
	<script src="http://connect.facebook.net/zh_TW/all.js"></script>
	<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
	<!-- AddToAny END -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-modal.js"></script>
    <script src="app3.js"></script>
  </body>
</html>
