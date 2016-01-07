<?php session_start(); ?>


<?php  
	$url = "http://52.91.113.244:8080/similarity_graph?recipeID=".$_SESSION['dislike'];
	$data = file_get_contents($url);
	echo $data;
?>
