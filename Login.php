<?php session_start(); ?>

<?php

$n = $_POST['name'];
$p = $_POST['password'];

$url = "http://52.91.113.244:8080/user?name=".$n."&password=".$p;

$data = file_get_contents($url);
$obj = json_decode($data);
if(isset($obj[0])!=NULL)
{
	$_SESSION['age']=0;
	$_SESSION['height']=0;
	$_SESSION['weight']=0;
  $_SESSION['gender']='M';
	
	$_SESSION['login']=true;
	$_SESSION['id'] = $obj[0]->_id;
  $_SESSION['name'] = $obj[0]->name;
  $_SESSION['age'] = $obj[0]->age;
	$_SESSION['weight'] = $obj[0]->weight;
	$_SESSION['height'] = $obj[0]->height;
	$_SESSION['gender'] = $obj[0]->gender;
	$_SESSION['looking_for'] = $obj[0]->looking_for;
  $_SESSION['budget_pref'] = $obj[0]->budget_pref;
  $_SESSION['dietary_pref'] = $obj[0]->dietary_pref;
	
	//echo $_SESSION['id'];
	
  //echo "Name: ".$obj[0]->name."\n";
  //echo "Password: ".$obj[0]->password;
	//header("location: team15_index2.php");
	header("location: main_frame.php");
		
}
else
{
  echo "<script> alert('Oops. Please Check Your Username and Password. Redirecting to Index Page.'); </script>"; 
	echo "<meta http-equiv='Refresh' content='0;URL=./main_frame.php'>"; 
}
?>

