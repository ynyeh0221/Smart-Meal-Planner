<?php session_start(); ?>
<?php

$n = $_POST['name'];
$p = $_POST['password'];
$c = $_POST['confirm'];

$url = "http://52.91.113.244:8080/user?name=".$n."&password=".$p;

$data = file_get_contents($url);
$obj = json_decode($data);

if($n==NULL && $p!=NULL)
{
    echo "<script> alert('Username is Required.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>"; 
}
else if($n!=NULL && $p==NULL)
{
    echo "<script> alert('Password is Required.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>"; 
}
else if($n==NULL && $p==NUll)
{
    echo "<script> alert('Username and Password are Required.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>"; 
}
else if($c==NULL)
{
    echo "<script> alert('Confirm is Required.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>"; 
}
else if($p!=NULL && $c!=NULL && $p!=$c)
{
    echo "<script> alert('Password and Confirm are not the same.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>";
}
else if($obj[0]!=NULL)
{
    echo "<script> alert('Account and Password Already Exist.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>"; 
}
else
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    if($output == false)
    {
        echo "<script> alert('Oops.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./register.html'>"; 
    }
    else
    {
        $result = json_decode($output,true);	
	echo "<script> alert('Welcome!!! Redirecting to Login Page.'); </script>";
	echo "<meta http-equiv='Refresh' content='0;URL=./login.html'>";
    }
}

curl_close($ch);

?>
