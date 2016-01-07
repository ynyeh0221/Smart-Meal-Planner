<?php session_start(); ?>
<?php $_SESSION['edit']=1?>




<!DOCTYPE html>
<!--This page is designed and built by Yi-Nung Yeh-->
<head>
		<?php

		if($_SESSION['login']==false)
		{
    	echo "<script> alert('Please Login. Redirect to index page.'); </script>";
		session_unset();
    	session_destroy();
		echo "<meta http-equiv='Refresh' content='0; URL=./team15_index2.php'>"; 
		}
		?>
		<meta charset="UTF-8">
		<title>Edit BMI</title>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
    	<link href="bootstrap.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Sigmar+One%7CFredericka+the+Great%7CCabin+Sketch%7CDenk+One%7CRacing+Sans+One%7CCarter+One%7CLemon%7CKnewave' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Palanquin:700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Special+Elite%7CFredericka+the+Great%7CLove+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="icon.ico">
		<link href="recipes.css" rel="stylesheet">
		
		
		<style type="text/css">
  		.off { display: none }
  		.on  { display: inline }
		body
		{
  		     background-image:url('140.jpg');
    	     -webkit-background-size: cover;
     	     -moz-background-size: cover;
       	     -o-background-size: cover;
             background-size: cover;
  		     background-attachment:fixed;
    	 }
		 option
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:18px;
		 
		 }
         #age
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:0.6em;
			 padding-top:0px;
			 height:38px;
			 border:solid, 3px;
			 width:70px;
		 }
		 #weight
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:0.6em;
			 padding-top:0px;
			 height:38px;
			 border:solid, 3px;
			 width:70px;
		 }
		 #height
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:0.6em;
			 padding-top:0px;
			 height:38px;
			 border:solid, 3px;
			 width:70px;
		 }
		 select
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:0.6em;
			 padding-top:0px;
			 height:35px;
		 
		 }
		 </style>
		
</head>
<body style="overflow-y:scroll;overflow-x:hidden;"> 
	
<div id="c">
  <h1 class="title2">Edit BMI</h1>			
  <a class="myButton" href="editfr.php">Edit Favorite Recipes &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br><br><br>
  
  <form name="login" id="login" method="POST" action="add_preference.php">
  <table id="table-2" align="center">
    <tr >
	<th colspan="4" style="text-align:center;">Current Information</th>
	</tr>
    <tr>
    <th style="text-align:center;" >Gender</th><th style="text-align:center;">Age</th><th style="text-align:center;">Weight</th><th style="text-align:center;" >Height</th>
	</tr>
	<tr>
	<td style="text-align:center;"><?php if($_SESSION['gender']==null){echo "N/A";} else{echo $_SESSION['gender'];}?></td><td style="text-align:center;"><?php if($_SESSION['age']==null){echo 0;} else{echo $_SESSION['age'];}?>  years old</td><td style="text-align:center;"><?php if($_SESSION['weight']==null){echo 0;} else{echo $_SESSION['weight'];} ?> kg</td>	<td style="text-align:center;"><?php if($_SESSION['height']==null){echo 0;} else{echo $_SESSION['height'];} ?> cm</td>
	</tr>
	<tr>
	<td colspan="4" style="text-align:center;">
	</tr>
	<tr>
	<th style="text-align:center;" colspan="4">New Information</th>
	</tr>
    <tr>
	<td style="text-align:center;"><input class="ini" type="radio" value="M" name="gender"> M &nbsp; &nbsp; &nbsp; &nbsp; <input class="ini" type="radio" value="F" name="gender"> F</td>
	<td style="text-align:center;"><input class="ini" type="number" id="age" name="age" min="1" max="120" >  years old</td>
	<td style="text-align:center;"><input class="ini" type="number" id="weight" name="weight" min="1" max="300"/> kg</td>
	<td style="text-align:center;"><input class="ini" type="number" id="height" name="height" min="60" max="250"/> cm</td>
	</tr>
  </table>
  <br>
  <br>
  <button class="myButton3" type="submit">Update</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input class="myButton3" type="button" onClick="javascript:location.href='<?php if($_SESSION['lastpage']==1){echo "recipes.php";} else if($_SESSION['lastpage']==2) {echo "recipes_nu.php";} else {echo "recipes_sl.php";} ?>'" value="Back">
  <br>
  </form> 
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>	
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="bootstrap-modal.js"></script>
  <script src="app3.js"></script>
  </body>
</html>
