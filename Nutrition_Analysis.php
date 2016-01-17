<?php session_start(); ?>

<!--This page is designed and built by Yi-Nung Yeh-->

<?php

if($_SESSION['login']==false)
{
    echo "<script> alert('Please Login. Redirect to index page.'); </script>";
    session_unset();
    session_destroy();
    echo "<meta http-equiv='Refresh' content='0; URL=../team15_index2.php'>"; 
}

// set the PHP timelimit to 10 minutes
set_time_limit(1000);
// rest of your code will be able to run for the next 10 minutes before timing out
ini_set('max_execution_time',1000);

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

$obj_r = $_SESSION['result'];

$urln1 = "http://localhost:8080/recipes?recipeID=".$obj_r[0][0];
$urln2 = "http://localhost:8080/recipes?recipeID=".$obj_r[0][1];
$urln3 = "http://localhost:8080/recipes?recipeID=".$obj_r[0][2];

$url1 = "http://localhost:8080/nutrition?recipeID=".$obj_r[0][0];
$url2 = "http://localhost:8080/nutrition?recipeID=".$obj_r[0][1];
$url3 = "http://localhost:8080/nutrition?recipeID=".$obj_r[0][2];

$url_base = "http://52.91.113.244:8080/requirement?age=".$_SESSION['age']."&gender=".$_SESSION['gender'];

$data1 = file_get_contents($url1);
$data2 = file_get_contents($url2);
$data3 = file_get_contents($url3);
$datan1 = file_get_contents($urln1);
$datan2 = file_get_contents($urln2);
$datan3 = file_get_contents($urln3);
$data_base = file_get_contents($url_base);
$op1 = json_decode($data1);
$op2 = json_decode($data2);
$op3 = json_decode($data3);
$opn1 = json_decode($datan1);
$opn2 = json_decode($datan2);
$opn3 = json_decode($datan3);
$op_base = json_decode($data_base);

$rname1=$opn1[0]->name;
$rname2=$opn2[0]->name;
$rname3=$opn3[0]->name;
$smallImage1=$opn1[0]->smallImage1;
$smal2Image1=$opn2[0]->smallImage2;
$smal3Image1=$opn3[0]->smallImage3;

$val1_a=0;
$val2_a=0;
$val3_a=0;
$val_base_a=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->description=="Vitamin A, IU")
	   $val1_a=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->attribute=="VITA" && $op2[$i]->value<=1000)
	   $val2_a=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->attribute=="VITA" && $op3[$i]->value<=1000)
	   $val3_a=0.5*$op3[$i]->value;
}
$val_base_a=$op_base[0]->VITA;
$percentage_vita = 0.35*($val1_a+$val2_a+$val3_a)/$val_base_a*100;


$val1_b12=0;
$val2_b12=0;
$val3_b12=0;
$val_base_b12=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->description=="Vitamin B-12")
	   $val1_b12=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->description=="Vitamin B-12")
	   $val2_b12=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->description=="Vitamin B-12")
	   $val3_b12=0.5*$op3[$i]->value;
}
$val_base_b12=$op_base[0]->VITB12;
$percentage_vitb12 = 1000000*($val1_b12+$val2_b12+$val3_b12)/$val_base_b12*100;



$val1_c=0;
$val2_c=0;
$val3_c=0;
$val_base_c=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->attribute=="VITC")
	   $val1_c=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->attribute=="VITC")
	   $val2_c=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->attribute=="VITC")
	   $val3_c=0.5*$op3[$i]->value;
}
$val_base_c=$op_base[0]->VITC;
$percentage_vitc = 1000*($val1_c+$val2_c+$val3_c)/$val_base_c*100;


$val1_d=0;
$val2_d=0;
$val3_d=0;
$val_base_d=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->attribute=="VITD")
	   $val1_d=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->attribute=="VITD")
	   $val2_d=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->attribute=="VITD")
	   $val3_d=0.5*$op3[$i]->value;
}
$val_base_d=$op_base[0]->VITD;
$percentage_vitd = 0.025*($val1_d+$val2_d+$val3_d)/$val_base_d*100;


$val1_pro=0;
$val2_pro=0;
$val3_pro=0;
$val_base_pro=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->description=="Protein")
	   $val1_pro=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->description=="Protein")
	   $val2_pro=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->description=="Protein")
	   $val3_pro=0.5*$op3[$i]->value;
}
$val_base_pro=$op_base[0]->PROCNT*$_SESSION['weight'];
$percentage_pro = ($val1_pro+$val2_pro+$val3_pro)/$val_base_pro*100;


$val1_e=0;
$val2_e=0;
$val3_e=0;
$val_base_e=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->description=="Vitamin E (alpha-tocopherol)")
	   $val1_e=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->description=="Vitamin E (alpha-tocopherol)")
	   $val2_e=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->description=="Vitamin E (alpha-tocopherol)")
	   $val3_e=0.5*$op3[$i]->value;
}
$val_base_e=$op_base[0]->TOCPHA;
$percentage_tocpha = 1000*($val1_e+$val2_e+$val3_e)/$val_base_e*100;


$val1_ir=0;
$val2_ir=0;
$val3_ir=0;
$val_base_ir=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->attribute=="FE")
	   $val1_ir=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->attribute=="FE")
	   $val2_ir=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->attribute=="FE")
	   $val3_ir=0.5*$op3[$i]->value;
}
$val_base_ir=$op_base[0]->FE;
$percentage_iron = 1000*($val1_ir+$val2_ir+$val3_ir)/$val_base_ir*100;


$val1_ca=0;
$val2_ca=0;
$val3_ca=0;
$val_base_ca=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->attribute=="CA")
	   $val1_ca=0.5*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->attribute=="CA")
	   $val2_ca=0.5*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->attribute=="CA")
	   $val3_ca=0.5*$op3[$i]->value;
}
$val_base_ca=$op_base[0]->CA;
$percentage_ca = 1000*($val1_ca+$val2_ca+$val3_ca)/$val_base_ca*100;



$val1_en=0;
$val2_en=0;
$val3_en=0;
for($i=0;$i<sizeof($op1);$i++)
{
    if($op1[$i]->attribute=="ENERC_KCAL")
	   $val1_en=1/1.375*$op1[$i]->value;
}
for($i=0;$i<sizeof($op2);$i++)
{
    if($op2[$i]->attribute=="ENERC_KCAL")
	   $val2_en=1/1.375*$op2[$i]->value;
}
for($i=0;$i<sizeof($op3);$i++)
{
    if($op3[$i]->attribute=="ENERC_KCAL")
	   $val3_en=1/1.375*$op3[$i]->value;
}
if($_SESSION['gender']=='M')
    $percentage_energy = ($val1_en+$val2_en+$val3_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66)*100;
elseif($_SESSION['gender']=='F')
    $percentage_energy = ($val1_en+$val2_en+$val3_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655)*100;
else
    $percentage_energy=0;

?>

<!--The arc graphs are refered from BrightPoint Consulting, Inc-->

<!--
/**
Copyright (c) 2014 BrightPoint Consulting, Inc.

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/
-->
<!DOCTYPE html>
<head>
    <title>Monday</title>
    <meta HTTP-EQUIV="X-UA-COMPATIBLE" CONTENT="IE=EmulateIE9" >
    <script type="text/javascript" src="scripts/d3.min.js"></script>
    <script type="text/javascript" src="scripts/radialProgress.js"></script>
    <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Luckiest+Guy' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Palanquin:700' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="styles/style.css">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style3.css" rel="stylesheet">
	
<style>


body{
  height:2000px;
  font-size:medium;
}

@media only screen and (min-width: 200px) {
}



@media only screen and (min-width: 300px) {
 select
{
    font-size: 31%;
    font-family: 'Palanquin', sans-serif;
    height:10.4px;
    width:37%;
}
}


@media only screen and (min-width: 768px) {
 select
{
    font-size: 80%;
    font-family: 'Palanquin', sans-serif;
    height:26.4px;
    width:37%;
}
}


@media only screen and (min-width: 1170px) {
 select
{
    font-size: 120%;
    font-family: 'Palanquin', sans-serif;
    height:40px;
    width:37%;
}
}
	

.bgClip {
    background: -webkit-linear-gradient(transparent, transparent), url(133.jpg);
    background: -o-linear-gradient(transparent, transparent);
    background-repeat:repeat-x;
    background-position:0 0;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    color: black;
    text-align:center;
    font-family:'Racing Sans One', cursive;
    font-weight: normal; 
    line-height:80px;
    margin: 0;
    -webkit-animation:BackgroundAnimated 15s linear infinite;
    -moz-animation:BackgroundAnimated 15s linear infinite;
    -ms-animation:BackgroundAnimated 15s linear infinite;
    -o-animation:BackgroundAnimated 15s linear infinite;
    animation:BackgroundAnimated 15s linear infinite;
}

.bgClip:after {
  color: transparent;
  content: attr(data-content);
  display: block;
  text-shadow: -1px -1px 1px rgba(255,255,255,0.25), 1px 1px 1px #63c8ba, 2px 2px 2px rgba(0,0,0,1), 6px 4px 8px rgba(0,0,0,0.5);
  position: absolute;
  left: 0;
  top: 0;
  speak: none;
  z-index: -1;
}
@keyframes BackgroundAnimated {
    from {
        background-position:0 0
    }
    to {
        background-position:100% 0
    }
}
@-webkit-keyframes BackgroundAnimated {
    from {
        background-position:0 0
    }
    to {
        background-position:100% 0
    }
}
@-ms-keyframes BackgroundAnimated {    
    from {
        background-position:0 0
    }
    to {
        background-position:100% 0
    }
}
@-moz-keyframes BackgroundAnimated {
    from {
        background-position:0 0
    }
    to {
        background-position:100% 0
    }
}
</style>
	
<script type='text/javascript'>
$(window).load(function(){
$('.js-open-box').on('click',function(){
    $('.overlay,.box-login').fadeIn(200);
});

$('.overlay').on('click',function(){
    $('.overlay,.box-login').fadeOut(200,function(){
        $(this).removeAttr('style');
    });
});
});

</script>
<script type="text/javascript">

www=window.outerWidth;

window.onresize = resize;

function resize()
{
 www=window.outerWidth;
 location.reload();
}
</script>
</head>

<body>
        <div id="d1" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
	  <div class="modal-body">
                <div >
                        <div >
		                <h3 style="text-align:center">Analysis of Energy</h3>
				<table align="center" class="table-2">
				<tr>
				<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
				</tr>
				<tr>
				<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
				</tr>
				<tr>
				<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
				</tr>
				<tr>
				<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php if($_SESSION['gender']=='M')
                                                                                    echo number_format(($val1_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66)*100,2);
                                                                                 elseif($_SESSION['gender']=='F')
                                                                                    echo number_format(($val1_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655)*100,2); ?> %</td>
				</tr>
				<tr>
				<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php if($_SESSION['gender']=='M')
                                                                                    echo number_format(($val2_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66)*100,2);
                                                                                   elseif($_SESSION['gender']=='F')
                                                                                    echo number_format(($val2_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655)*100,2); ?> %</td>
				</tr>
				<tr>
				<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php if($_SESSION['gender']=='M')
                                                                                    echo number_format(($val3_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66)*100,2);
                                                                                 elseif($_SESSION['gender']=='F')
                                                                                    echo number_format(($val3_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655)*100,2); ?> %</td>
				</tr>
				</table>
                        </div>
                  </div>
            </div>            
        </div>
	
	<div id="d2" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
		<div class="modal-body">
                  <div >
                    <div >
			        <h3 style="text-align:center">Analysis of Protein</h3>
				<table align="center" class="table-2">
				<tr>
				<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
				</tr>
				<tr>
				<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
				</tr>
				<tr>
				<tr>
				<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
				</tr>
				<tr>
				<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format($val1_pro/$val_base_pro*100,2) ?> %</td>
				</tr>
				<tr>
				<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format($val2_pro/$val_base_pro*100,2) ?> %</td>
				</tr>
				<tr>
				<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format($val3_pro/$val_base_pro*100,2) ?> %</td>
				</tr>
				</table>
                        </div>
                  </div>
            </div>            
        </div>
	
		<div id="d3" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Vitamin A</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(0.35*$val1_a/$val_base_a*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(0.35*$val2_a/$val_base_a*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(0.35*$val3_a/$val_base_a*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>
	
		<div id="d4" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Vitamin C</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(1000*$val1_c/$val_base_c*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(1000*$val2_c/$val_base_c*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(1000*$val3_c/$val_base_c*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>
	
		<div id="d5" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Vitamin D</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(0.025*$val1_d/$val_base_d*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(0.025*$val2_d/$val_base_d*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(0.025*$val3_d/$val_base_d*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>
	
		<div id="d6" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Vitamin B-12</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(1000000*$val1_b12/$val_base_b12*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(1000000*$val2_b12/$val_base_b12*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(1000000*$val3_b12/$val_base_b12*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>
	
		<div id="d7" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Vitamin E</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(1000*$val1_e/$val_base_e*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(1000*$val2_e/$val_base_e*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(1000*$val3_e/$val_base_e*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>
	
		<div id="d8" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Iron</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(1000*$val1_ir/$val_base_ir*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(1000*$val2_ir/$val_base_ir*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(1000*$val3_ir/$val_base_ir*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>
	
		<div id="d9" class="modal hide fade in" role="dialog" style="display: none; " aria-hidden="true">
			<div class="modal-body">
                  <div >
                    <div >
				        <h3 style="text-align:center">Analysis of Calcium</h3>
						<table align="center" class="table-2">
						<tr>
						<th>Gender</th><th>Age</th><th>Weight(kg)/Height(cm)</th>
						</tr>
						<tr>
						<td><?php echo $_SESSION['gender']?></td><td><?php echo $_SESSION['age']?></td><td><?php echo $_SESSION['weight']?>/<?php echo $_SESSION['height']?></td>
						</tr>
						<tr>
						<tr>
						<th></th><th>Recipe Name</th><th>Percentage of DNR</th>
						</tr>
						<tr>
						<th>Breakfast</th><td><a href="../mp/recipes2.php"><?php echo $rname1?></a></td><td><?php echo number_format(1000*$val1_ca/$val_base_ca*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Lunch</th><td><a href="../mp/recipes2.php"><?php echo $rname2?></a></td><td><?php echo number_format(1000*$val2_ca/$val_base_ca*100,2) ?> %</td>
						</tr>
						<tr>
						<th>Dinner</th><td><a href="../mp/recipes2.php"><?php echo $rname3?></a></td><td><?php echo number_format(1000*$val3_ca/$val_base_ca*100,2) ?> %</td>
						</tr>
						</table>
                    </div>
                  </div>
            </div>            
    </div>

  
	
<div id="container">

	 <h1 class="bgClip">Monday Nutrition Analysis</h1>
	 <br>
	 <br>
	 <select onChange="location = this.options[this.selectedIndex].value;">
	 <option value="#">Select an Analysis</option>
	 <option value="nutrition_analysis.php">Nutritions of Monday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="tues.php">Nutritions of Tuesday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="wed.php">Nutritions of Wednesday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="thur.php">Nutritions of Thursday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="fri.php">Nutritions of Friday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="satu.php">Nutritions of Saturday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="sun.php">Nutritions of Sunday Meal Plan v.s. Daily Nutrition Requirement</option>
	 <option value="../teststack1124.html">Weekly Nutritions Comparison</option>
	 </select>
	 <br>
	 <br>
	<div class="ccc">
		  <h3>Part I: Nutrition Provided by Our Recipes v.s. Daily Nutrition Requirement (DNR)</h3>
		  <ul>
		      <li>If all values are zero, <a href="../edit.php">click me</a> to edit BMI.</li>
			  <li>The precentage shown in each arc graph is <b>how many precentage of DNR could we get from today's meal plan</b>.</li>
			  <li>For example,</li>
			        <table align="center">
					    <tr>
						<td style="text-align:center"><div id="div1ex"></div></td>
						</tr>
					</table>
		      <li style="list-style-type: none;">means that we can get <?php echo number_format($percentage_energy,2)?>% of daily energy requirement from today's meal plan.</li>
		      <li><b>Click an arc graph</b> to show the detailed analysis table, which contains
			  <li style="list-style-type: none;">
			  <ul>
			      <li>your gender, age, weight, height,</li>
				  <li>the names of recipes,</li>
				  <li>the comparison between <b>the precentage of DNR which we could get from today's breakfast</b>, <b>lunch</b>, and <b>dinner</b>.</li>
			  </ul>
			  </li>
		  </ul>
  
	
   <table class="ttttt" align="center">
	<tr>
        <td><a data-toggle="modal" href="#d1"><div id="div1"></div></a></td>
        <td><a data-toggle="modal" href="#d2"><div id="div2"></div></a></td>
        <td><a data-toggle="modal" href="#d3"><div id="div3"></div></a></td>
	</tr>
	<tr>
        <td><a data-toggle="modal" href="#d4"><div id="div4"></div></a></td>
        <td><a data-toggle="modal" href="#d5"><div id="div5"></div></a></td>
        <td><a data-toggle="modal" href="#d6"><div id="div6"></div></a></td>
	</tr>
	<tr>
        <td><a data-toggle="modal" href="#d7"><div id="div7"></div></a></td>
        <td><a data-toggle="modal" href="#d8"><div id="div8"></div></a></td>
        <td><a data-toggle="modal" href="#d9"><div id="div9"></div></a></td>
	</tr>
	</table>
	
	</div>
	<br> 
	
	<div class="ccc">
		 <h3>Part II: Nutrition Comparision between Breakfast, Lunch and Dinner</h3>
		 <ul>
		     <li>If all values are zero, <a href="../edit.php">click me</a> to edit BMI.</li>
			 <li>The precentages shown in the radar graph are <b>P<sub>breakfast, selected nutrition</sub></b>, <b>P<sub>lunch, selected nutrition</sub></b>, and <b>P<sub>dinner, selected nutrition</sub></b>.</li>
		     <li style="list-style-type: none;">
			 <ul>
			     <li>The <b><font color="blue">blue line</font></b> indicates <b>the precentage of DNR which we could get from today's breakfast</b>,</li>
			 	 <li>The <b><font color="red">red line</font></b> indicates <b>the precentage of DNR which we could get from today's lunch</b>,</li>
			 	 <li>The <b><font color="yellow">yellow line</font></b> indicates <b>the precentage of DNR which we could get from today's dinner</b>.</li>
			 </ul>
			 </li>
		</ul>


	<div align="center" class="radarChart"></div>
	</div>
	<br>
	<br>
	<br>
	
	<br>
	<br>
	<br>
</div>

<script >  
	
	var div1=d3.select(document.getElementById('div1'));
	var div1ex=d3.select(document.getElementById('div1ex'));
    var div2=d3.select(document.getElementById('div2'));
    var div3=d3.select(document.getElementById('div3'));
    var div4=d3.select(document.getElementById('div4'));
	var div5=d3.select(document.getElementById('div5'));
    var div6=d3.select(document.getElementById('div6'));
    var div7=d3.select(document.getElementById('div7'));
    var div8=d3.select(document.getElementById('div8'));
	var div9=d3.select(document.getElementById('div9'));

    start();
	
	
    function labelFunction(val,min,max) {

    }

	
    function start() {
	
	    var dia=150;
		if(www<1170 && www>=768)
		    dia=100;
		else if(www<768 && www>=300)
		    dia=40;
		else if(www<300)
		    dia=25.5;

        var rp1 = radialProgress(document.getElementById('div1'))
                .label("Energy")
                .diameter(dia)
                .value(<?php echo $percentage_energy ?>)
                .render();
				
		var rp1 = radialProgress(document.getElementById('div1ex'))
                .label("Energy")
                .diameter(dia)
                .value(<?php echo $percentage_energy ?>)
                .render();
				
	    var rp2 = radialProgress(document.getElementById('div2'))
                .label("Protein")
                .diameter(dia)
                .value(<?php echo $percentage_pro ?>)
                .render();
				
				
		var rp3 = radialProgress(document.getElementById('div3'))
                .label("Vitamin A")
                .diameter(dia)
                .value(<?php echo $percentage_vita ?>)
                .render();

        var rp4 = radialProgress(document.getElementById('div4'))
                .label("Vitamin C")
                .diameter(dia)
                .value(<?php echo $percentage_vitc ?>)
                .render();

        var rp5 = radialProgress(document.getElementById('div5'))
                .label("Vitamin D")
                .diameter(dia)
                .value(<?php echo $percentage_vitd ?>)
                .render();
				
		var rp6 = radialProgress(document.getElementById('div6'))
                .label("Vitamin B-12")
                .diameter(dia)
                .value(<?php echo $percentage_vitb12 ?>)
                .render();

        

        var rp7 = radialProgress(document.getElementById('div7'))
                .label("Vitamin E")
                .diameter(dia)
                .value(<?php echo $percentage_tocpha ?>)
                .render();
				
		var rp8 = radialProgress(document.getElementById('div8'))
                .label("Iron")
                .diameter(dia)
                .value(<?php echo $percentage_iron ?>)
                .render();

        var rp9 = radialProgress(document.getElementById('div9'))
                .label("Calcium")
                .diameter(dia)
                .value(<?php echo $percentage_ca ?>)
                .render();

    }
    </script>


		<script src="radarChart.js"></script>	
		<script>
			////////////////////////////////////////////////////////////// 
			//////////////////////// Set-Up ////////////////////////////// 
			////////////////////////////////////////////////////////////// 
			
		var ww=600;
		if(www<1170 && www>=768)
		    ww=396;
		else if(www<768 && www>=300)
		    ww=156;
		else if(www<300 && www>=200)
		    ww=102;
			

			var margin = {top: 100, right: 100, bottom: 100, left: 100},
				width = Math.min(700, window.innerWidth - 10) - margin.left - margin.right,
				height = Math.min(width, window.innerHeight - margin.top - margin.bottom - 20);
					
			////////////////////////////////////////////////////////////// 
			////////////////////////// Data ////////////////////////////// 
			////////////////////////////////////////////////////////////// 

			var data = [
					  [//dinner
						{axis:"Energy",value:<?php if($_SESSION['gender']=='M')echo number_format(($val3_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66),2);
                                                   else if($_SESSION['gender']=='F')
                                                     echo number_format(($val3_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655),2); ?>},
						{axis:"Protein",value:<?php echo number_format($val3_pro/$val_base_pro,2) ?>},
						{axis:"Vitamin A",value:<?php echo number_format(0.35*$val3_a/$val_base_a,2) ?>},
						{axis:"Vitamin C",value:<?php echo number_format(1000*$val3_c/$val_base_c,2) ?>},
						{axis:"Vitamin D",value:<?php echo number_format(0.025*$val3_d/$val_base_d,2) ?>},
						{axis:"Vitamin E",value:<?php echo number_format(1000*$val3_e/$val_base_e,2) ?>},
						{axis:"Iron",value:<?php echo number_format(1000*$val3_ir/$val_base_ir,2) ?>},
						{axis:"Calcium",value:<?php echo number_format(1000*$val3_ca/$val_base_ca,2) ?>}		
					  ],
					  [//lunch
						{axis:"Energy",value:<?php if($_SESSION['gender']=='M')echo number_format(($val2_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66),2);
                                                   else if($_SESSION['gender']=='F')
                                                     echo number_format(($val2_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655),2); ?>},
						{axis:"Protein",value:<?php echo number_format($val2_pro/$val_base_pro,2) ?>},
						{axis:"Vitamin A",value:<?php echo number_format(0.35*$val2_a/$val_base_a,2) ?>},
						{axis:"Vitamin C",value:<?php echo number_format(1000*$val2_c/$val_base_c,2) ?>},
						{axis:"Vitamin D",value:<?php echo number_format(0.025*$val2_d/$val_base_d,2) ?>},
						{axis:"Vitamin E",value:<?php echo number_format(1000*$val2_e/$val_base_e,2) ?>},
						{axis:"Iron",value:<?php echo number_format(1000*$val2_ir/$val_base_ir,2) ?>},
						{axis:"Calcium",value:<?php echo number_format(1000*$val2_ca/$val_base_ca,2) ?>}		
					  ],
					  [//breakfast
						{axis:"Energy",value:<?php if($_SESSION['gender']=='M')echo number_format(($val1_en)/((13.7*$_SESSION['weight'])+(5.0*$_SESSION['height'])-(6.8*$_SESSION['age'])+66),2);
                                                   else if($_SESSION['gender']=='F')
                                                     echo number_format(($val1_en)/((9.6*$_SESSION['weight'])+(1.8*$_SESSION['height'])-(4.7*$_SESSION['age'])+655),2); ?>},
						{axis:"Protein",value:<?php echo number_format($val1_pro/$val_base_pro,2) ?>},
						{axis:"Vitamin A",value:<?php echo number_format(0.35*$val1_a/$val_base_a,2) ?>},
						{axis:"Vitamin C",value:<?php echo number_format(1000*$val1_c/$val_base_c,2) ?>},
						{axis:"Vitamin D",value:<?php echo number_format(0.025*$val1_d/$val_base_d,2) ?>},
						{axis:"Vitamin E",value:<?php echo number_format(1000*$val1_e/$val_base_e,2) ?>},
						{axis:"Iron",value:<?php echo number_format(1000*$val1_ir/$val_base_ir,2) ?>},
						{axis:"Calcium",value:<?php echo number_format(1000*$val1_ca/$val_base_ca,2) ?>}			
					  ]
					];
			////////////////////////////////////////////////////////////// 
			//////////////////// Draw the Chart ////////////////////////// 
			////////////////////////////////////////////////////////////// 

			var color = d3.scale.ordinal()
				.range(["#EDC951","#CC333F","#00A0B0"]);
				
			var radarChartOptions = {
			  w: width,
			  h: height,
			  margin: margin,
			  maxValue: 0.5,
			  levels: 5,
			  roundStrokes: true,
			  color: color
			};
			//Call function to draw the Radar chart
			RadarChart(".radarChart", data, radarChartOptions,ww,ww);
		</script>
	
	<script src="http://connect.facebook.net/zh_TW/all.js"></script>
	<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
	<!-- AddToAny END -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-modal.js"></script>
    <script src="app3.js"></script>

</body>
</html>
