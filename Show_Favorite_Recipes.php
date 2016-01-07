<?php session_start(); ?>

<!--This page is designed and built by Yi-Nung Yeh-->

<?php

$url = "http://52.91.113.244:8080/favourite?userID=".$_SESSION['id'];
$data = file_get_contents($url);
$op = json_decode($data);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Fri, 13 Nov 2015 01:19:59 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Palanquin:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
	<script src=â€jquery-1.9.1â€ type=â€text/javascriptâ€></script>
    <title></title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
	body{
      color:white;
	  border:none;
	  padding:15px;
	  font-family: 'Cabin Condensed', sans-serif;
	  font-size:medium;
	  overflow-x:hidden;
	  overflow-y:auto;
	 }
	 
	  submit {
      margin-top: 20px;
      font-size: 150%;
      font-weight: 100;
      padding: 5px 0;
      width: 100%;
	  }

   .float {
   display: inline-block;
   font-family: 'Palanquin', sans-serif;
   -webkit-transition-duration: 0.3s;
   transition-duration: 0.3s;
   -webkit-transition-property: transform;
   transition-property: transform;
   -webkit-transform: translateZ(0);
   transform: translateZ(0);
   box-shadow: 0 0 1px rgba(0, 0, 0, 0);
   }

   .float:hover, .float:focus, .float:active {
   -webkit-transform: translateY(-3px);
   transform: translateY(-3px);
   font-weight:bold;
   }
   
@media only screen and (min-width: 200px) {
body
{
    font-size:100%;
}
}

@media only screen and (min-width: 300px) {
body
{
    font-size:150%;
}
}

@media only screen and (min-width: 768px) {
body
{
    font-size:200%;
}
}

@media only screen and (min-width: 1170px) {
body
{
    font-size:250%;
}
}
   
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    iframe_auto_height(); //???ready???????iframe?????
  });
  //iframe auto height???
  function iframe_auto_height(){
    if(!this.in_site()) return;
    var iframe;
    $(parent.document).find("iframe").map(function(){ //?????iframe
      if($(this).contents().get(0).location == window.location) iframe = this;
    });
    if(!iframe) return;//no parent
    var content_height = $("body").height()+50;
    content_height = content_height < 300 ? 300 : content_height; //??????
    content_height = typeof content_height == 'number' ? content_height+"px" : content_height;
    iframe.style.height = content_height;
  }
  //????????iframe??
  function in_site(){
    if(parent != window && this.is_crosssite() == false) return(true);
    return(false);
  }
  //??????(????????????)
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
  <body style="overflow-y:yes">
       <?php if($op==null){echo "Use the Select Menu to Add Favorite Meals!";} else{ for($i=0;$i<sizeof($op);$i++) {echo str_replace(array("-", "_", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "Allrecipes"), " ", $op[$i]->recipeID);?>
	   <form method="POST" action="df.php">
	       <input type='hidden' name='delete' value='<?php echo $op[$i]->recipeID ?>' ><input class="float" id="d" type="submit" value="Delete" style="background-color:white;border:1px solid #202020;height:25px;">
	   </form>
	   <?php }} ?>
  </body>
</html>
