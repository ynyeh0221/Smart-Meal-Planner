<?php session_start(); ?>


<?php

if($_SESSION['login']==false)
{
    echo "<script> alert('Please Login. Redirect to index page.'); </script>";
	session_unset();
    session_destroy();
	echo "<meta http-equiv='Refresh' content='0; URL=../main_frame.php'>"; 
}

// set the PHP timelimit to 10 minutes
set_time_limit(1000);
// rest of your code will be able to run for the next 10 minutes before timing out
ini_set('max_execution_time',1000);

?>

<?php

if($_SESSION['result'] == null && $_SESSION['login']==true)
{
    $url_r = "http://52.91.113.244:8080/recommendation?userID=".$_SESSION['id'];
    $ch=curl_init();
    $timeout=980;
	
	curl_setopt($ch, CURLOPT_URL, $url_r);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

    $result=curl_exec($ch);
	curl_close($ch);
	$_SESSION['result']=json_decode($result);
    
}

?>


<?php
$obj_r =$_SESSION['result'];




$url1 = "http://localhost:8080/recipes?recipeID=".$obj_r[0][0];
$url2 = "http://localhost:8080/recipes?recipeID=".$obj_r[0][1];
$url3 = "http://localhost:8080/recipes?recipeID=".$obj_r[0][2];


$data1 = file_get_contents($url1);
$obj1 = json_decode($data1);
$data2 = file_get_contents($url2);
$obj2 = json_decode($data2);
$data3 = file_get_contents($url3);
$obj3 = json_decode($data3);

if(isset($obj1[0])!=NULL)
{
    $_SESSION['rname1'] = $obj1[0]->name;
    $_SESSION['rlargeImage1'] = $obj1[0]->largeImage;
	$_SESSION['rnumberOfServings1'] = $obj1[0]->numberOfServings;
	$_SESSION['rating1'] = $obj1[0]->rating;
    $_SESSION['sourceRecipeUrl1'] = $obj1[0]->sourceRecipeUrl;
	$_SESSION['totalTimeInSeconds1'] = $obj1[0]->totalTimeInSeconds;
	$_SESSION['numberOfServings1'] = $obj1[0]->numberOfServings;
}
if(isset($obj2[0])!=NULL)
{
    $_SESSION['rname2'] = $obj2[0]->name;
    $_SESSION['rlargeImage2'] = $obj2[0]->largeImage;
	$_SESSION['rnumberOfServings2'] = $obj2[0]->numberOfServings;
	$_SESSION['rating2'] = $obj2[0]->rating;
    $_SESSION['sourceRecipeUrl2'] = $obj2[0]->sourceRecipeUrl;
	$_SESSION['totalTimeInSeconds2'] = $obj2[0]->totalTimeInSeconds;
	$_SESSION['numberOfServings2'] = $obj2[0]->numberOfServings;
}
if(isset($obj3[0])!=NULL)
{
    $_SESSION['rname3'] = $obj3[0]->name;
    $_SESSION['rlargeImage3'] = $obj3[0]->largeImage;
	$_SESSION['rnumberOfServings3'] = $obj3[0]->numberOfServings;
	$_SESSION['rating3'] = $obj3[0]->rating;
    $_SESSION['sourceRecipeUrl3'] = $obj3[0]->sourceRecipeUrl;
	$_SESSION['totalTimeInSeconds3'] = $obj3[0]->totalTimeInSeconds;
	$_SESSION['numberOfServings3'] = $obj3[0]->numberOfServings;
}

?>


<!DOCTYPE html>

<!--This page is designed and built by Yi-Nung Yeh-->
  <head>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style4.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Palanquin:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Luckiest+Guy' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="icon.ico">
	<link href="recipes.css" rel="stylesheet">
    <title>Monday</title>
	<script>
    body{
	    background-attachment: fixed;
	    background-repeat: no-repeat;
    }
	.fa-thumbs-up {
    font-family: FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
	</script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	

  </head>
  <body>  
  
  
  
  
  
<div id="c">

<h1 class="title2">Monday Meal Plan</h1><br>
<select onChange="location = this.options[this.selectedIndex].value;">
<option value="#">Select A Day</option>
<option value="recipes2.php">Monday</option>
<option value="tues.php">Tuesday</option>
<option value="wed.php">Wednesday</option>
<option value="thur.php">Thursday</option>
<option value="fri.php">Friday</option>
<option value="satu.php">Saturday</option>
<option value="sun.php">Sunday</option>
</select>
<br>
<br>

      <div class="article current">
        <div class="item row">
          <div class="col-xs-3">
            <p class="source"><img alt="b" src="<?php echo $_SESSION['rlargeImage1'] ?>"></p>
          </div>
          <div class="col-xs-6 cc1">
            <p class="title"><?php if($_SESSION['rname1']==null){echo "N/A";} else{echo $_SESSION['rname1'];} ?></p>
          </div>
          <div class="col-xs-3 cc1">
            <p class="pubdate"><?php for($j=0;$j<$_SESSION['rating1'];$j++){echo "<font color='gold'><i class='fa fa-star'></i></font>";} ?></p>
          </div>
        </div>
         <div class="description row">
          <div class="col-xs-3">Breakfast</div>
          <div class="col-xs-6">
			Cooking time: <?php echo number_format($_SESSION['totalTimeInSeconds1']/60,0) ?> minute(s)<br>
			Number of servings: <?php echo $_SESSION['numberOfServings1'] ?><br><br>
			<a class="myButton2" href="<?php if($_SESSION['sourceRecipeUrl1']==null){echo "N/A";} else{echo $_SESSION['sourceRecipeUrl1'];} ?>">To See Details &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br>
			<a class="myButton2" href="../rp/nutrition_analysis.php">To See Nutrition Analysis &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a>
          </div>
          <div class="col-xs-3">
		  <form method="POST" action="sf.php"><input type='hidden' name='add01' value='1'><button type="submit" class="myButton"><i class="fa fa-thumbs-up"></i> Add to Favorite</button></form>
		  <form method="POST" action="dis.php"><input type='hidden' name='dis01' value='1'><button type="submit" class="myButton"><i class="fa fa-thumbs-down"></i> Change It</button></form>
		  </div>
        </div>
      </div>

      <div class="article">
        <div class="item row">
          <div class="col-xs-3">
            <p class="source"><img alt="l" src="<?php echo $_SESSION['rlargeImage2'] ?>"></p>
          </div>
          <div class="col-xs-6 cc1">
            <p class="title"><?php if($_SESSION['rname2']==null){echo "N/A";} else{echo $_SESSION['rname2'];} ?></p>
          </div>
          <div class="col-xs-3 cc1">
            <p class="pubdate"><?php for($j=0;$j<$_SESSION['rating2'];$j++){echo "<font color='gold'><i class='fa fa-star'></i></font>";} ?></p>
          </div>
        </div>
        <div class="description row">
          <div class="col-xs-3">Lunch</div>
          <div class="col-xs-6">
			Cooking time: <?php echo number_format($_SESSION['totalTimeInSeconds2']/60,0) ?> minute(s)<br>
			Number of servings: <?php echo $_SESSION['numberOfServings2'] ?><br><br>
			<a class="myButton2" href="<?php if($_SESSION['sourceRecipeUrl2']==null){echo "N/A";} else{echo $_SESSION['sourceRecipeUrl2'];} ?>">To See Details &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br>
			<a class="myButton2" href="../rp/nutrition_analysis.php">To See Nutrition Analysis &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a>
          </div>
          <div class="col-xs-3">
		  <form method="POST" action="sf.php"><input type='hidden' name='add02' value='2'><button type="submit" class="myButton"><i class="fa fa-thumbs-up"></i> Add to Favorite</button></form>
		  <form method="POST" action="dis.php"><input type='hidden' name='dis02' value='2'><button type="submit" class="myButton"><i class="fa fa-thumbs-down"></i> Change It</button></form>
		  </div>
        </div>
      </div>

      <div class="article">
        <div class="item row">
          <div class="col-xs-3">
            <p class="source"><img alt="d" src="<?php echo $_SESSION['rlargeImage3'] ?>"></p>
          </div>
          <div class="col-xs-6 cc1">
            <p class="title"><?php if($_SESSION['rname3']==null){echo "N/A";} else{echo $_SESSION['rname3'];} ?></p>
          </div>
          <div class="col-xs-3 cc1">
            <p class="pubdate"><?php for($j=0;$j<$_SESSION['rating3'];$j++){echo "<font color='gold'><i class='fa fa-star'></i></font>";} ?></p>
          </div>
        </div>
        <div class="description row">
          <div class="col-xs-3">Dinner</div>
          <div class="col-xs-6">
				Cooking time: <?php echo number_format($_SESSION['totalTimeInSeconds3']/60,0) ?> minute(s)<br>
			Number of servings: <?php echo $_SESSION['numberOfServings3'] ?><br><br>
			<a class="myButton2" href="<?php if($_SESSION['sourceRecipeUrl3']==null){echo "N/A";} else{echo $_SESSION['sourceRecipeUrl3'];} ?>">To See Details &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br>
			<a class="myButton2" href="../rp/nutrition_analysis.php">To See Nutrition Analysis &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a>
          </div>
          <div class="col-xs-3">
		  <form method="POST" action="sf.php"><input type='hidden' name='add03' value='3'><button type="submit" class="myButton"><i class="fa fa-thumbs-up"></i> Add to Favorite</button></form>
		  <form method="POST" action="dis.php"><input type='hidden' name='dis03' value='3'><button type="submit" class="myButton"><i class="fa fa-thumbs-down"></i> Change It</button></form>
		  </div>
        </div>
      </div>
	 <br>
	 <br>
	 <br>
 	 
	 <br>
	 <br>
	 <br>
	 <br>
	 <div id="space"></div>
</div>


    <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="app2.js"></script>
	<script src="app3.js"></script>
	<script> 
    </script> 
  </body>
</html>
