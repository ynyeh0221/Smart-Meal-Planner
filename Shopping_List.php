<?php session_start(); ?>
<?php $_SESSION['lastpage']=3; ?>

<?php

if($_SESSION['login']==false)
{
    echo "<script> alert('Please Login. Redirect to index page.'); </script>";
    session_unset();
    session_destroy();
    echo "<meta http-equiv='Refresh' content='0; URL=./team15_index2.php'>"; 
}
?>


<!DOCTYPE html>

<!--This page is designed and built by Yi-Nung Yeh-->
  <head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
    <link href="bootstrap.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sigmar+One%7CFredericka+the+Great%7CCabin+Sketch%7CDenk+One%7CRacing+Sans+One%7CCarter+One%7CLemon%7CKnewave' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Palanquin:700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="icon.ico">
    <link href="recipes.css" rel="stylesheet">
    <title>Shopping list</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
	
  <style>

  body
  {
    background-image: url('133.jpg');
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
    background-size: cover;
    background-attachment:fixed;
  }
  </style>
  </head>
  <body style="overflow-y:scroll;overflow-x:hidden;">

<div id="d">
	
  <h1 class="title2">No more unexpected running out of groceries!</h1>
  <h3 class="subtitle2">A weekly shopping list with the items you'll need!</h3>
  <br>
  <a href="edit.php" class="myButton">Edit Preference &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br><br>
  <a href="./sl/shopping_list.php" class="myButton">Go Shopping  &nbsp; &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
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
