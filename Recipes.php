<?php session_start(); ?>
<?php $_SESSION['lastpage']=1; ?>

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
  <meta charset="utf-8" />
	<title>get recipes</title>
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
  <link href="bootstrap.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Sigmar+One%7CFredericka+the+Great%7CCabin+Sketch%7CDenk+One%7CRacing+Sans+One%7CCarter+One%7CLemon%7CKnewave' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Palanquin:700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="icon.ico">
	<link href="recipes.css" rel="stylesheet">
	
	<style>
	body
	{
  		 background-image: url('131.jpg');
    	 -webkit-background-size: cover;
     	 -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover;
  		 background-attachment:fixed;
  }
	</style>
	
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
    iframe_auto_height();
  });
  //iframe auto height???
  function iframe_auto_height(){
    if(!this.in_site()) return;
    var iframe;
    $(parent.document).find("iframe").map(function(){
      if($(this).contents().get(0).location == window.location) iframe = this;
    });
    if(!iframe) return;//no parent
    var content_height = $("body").height()+50;
    content_height = content_height < 300 ? 300 : content_height;
    content_height = typeof content_height == 'number' ? content_height+"px" : content_height;
    iframe.style.height = content_height;
  }

  function in_site(){
    if(parent != window && this.is_crosssite() == false) return(true);
    return(false);
  }

  function is_crosssite() {
    try {
      parent.location.host;
      return(false);
    }
    catch(e) {
      return(true);
    }
  }
</script>
  </head>

<body style="overflow-y:scroll;overflow-x:hidden;">  
<div id="d">

  <h1 class="title2">Save time deciding every day.</h1>
  <h3 class="subtitle2">A weekly meal schedule personalized for you!</h3>
  <br>
  <a href="edit.php" class="myButton">Edit Preference &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br><br>
	<a href="./mp/recipes2.php" class="myButton">Get Meal Plan  &nbsp; &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a>

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
