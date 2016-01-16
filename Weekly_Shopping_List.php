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

$obj_r = $_SESSION['result'];

$url01 = "http://localhost:8080/ingredient?recipeID=".$obj_r[0][0];
$url02 = "http://localhost:8080/ingredient?recipeID=".$obj_r[0][1];
$url03 = "http://localhost:8080/ingredient?recipeID=".$obj_r[0][2];
$url11 = "http://localhost:8080/ingredient?recipeID=".$obj_r[1][0];
$url12 = "http://localhost:8080/ingredient?recipeID=".$obj_r[1][1];
$url13 = "http://localhost:8080/ingredient?recipeID=".$obj_r[1][2];
$url21 = "http://localhost:8080/ingredient?recipeID=".$obj_r[2][0];
$url22 = "http://localhost:8080/ingredient?recipeID=".$obj_r[2][1];
$url23 = "http://localhost:8080/ingredient?recipeID=".$obj_r[2][2];
$url31 = "http://localhost:8080/ingredient?recipeID=".$obj_r[3][0];
$url32 = "http://localhost:8080/ingredient?recipeID=".$obj_r[3][1];
$url33 = "http://localhost:8080/ingredient?recipeID=".$obj_r[3][2];
$url41 = "http://localhost:8080/ingredient?recipeID=".$obj_r[4][0];
$url42 = "http://localhost:8080/ingredient?recipeID=".$obj_r[4][1];
$url43 = "http://localhost:8080/ingredient?recipeID=".$obj_r[4][2];
$url51 = "http://localhost:8080/ingredient?recipeID=".$obj_r[5][0];
$url52 = "http://localhost:8080/ingredient?recipeID=".$obj_r[5][1];
$url53 = "http://localhost:8080/ingredient?recipeID=".$obj_r[5][2];
$url61 = "http://localhost:8080/ingredient?recipeID=".$obj_r[6][0];
$url62 = "http://localhost:8080/ingredient?recipeID=".$obj_r[6][1];
$url63 = "http://localhost:8080/ingredient?recipeID=".$obj_r[6][2];


$data01 = file_get_contents($url01);
$obj01 = json_decode($data01);
$data02 = file_get_contents($url02);
$obj02 = json_decode($data02);
$data03 = file_get_contents($url03);
$obj03 = json_decode($data03);
$data11 = file_get_contents($url11);
$obj11 = json_decode($data11);
$data12 = file_get_contents($url12);
$obj12 = json_decode($data12);
$data13 = file_get_contents($url13);
$obj13 = json_decode($data13);
$data21 = file_get_contents($url21);
$obj21 = json_decode($data21);
$data2 = file_get_contents($url2);
$obj22 = json_decode($data22);
$data23 = file_get_contents($url23);
$obj23 = json_decode($data23);
$data31 = file_get_contents($url31);
$obj31 = json_decode($data31);
$data32 = file_get_contents($url32);
$obj32 = json_decode($data32);
$data33 = file_get_contents($url33);
$obj33 = json_decode($data33);
$data41 = file_get_contents($url41);
$obj41 = json_decode($data41);
$data42 = file_get_contents($url42);
$obj42 = json_decode($data42);
$data43 = file_get_contents($url43);
$obj43 = json_decode($data43);
$data51 = file_get_contents($url51);
$obj51 = json_decode($data51);
$data52 = file_get_contents($url52);
$obj52 = json_decode($data52);
$data53 = file_get_contents($url53);
$obj53 = json_decode($data53);
$data61 = file_get_contents($url61);
$obj61 = json_decode($data61);
$data62 = file_get_contents($url62);
$obj62 = json_decode($data62);
$data63 = file_get_contents($url63);
$obj63 = json_decode($data63);



?>


<!DOCTYPE html>

    <!--This page is designed and built by Yi-Nung Yeh-->
	
    <meta charset="utf-8">
    <title>Shopping List</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style4.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Luckiest+Guy' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Palanquin:500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>
	<link href="recipes.css" rel="stylesheet">
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<style>
	
	body
	{
	    height:3500px;
	}

</style>

</head>
<body>
	
<div id="c">
<h1 class="title2">Shopping List</h1>
<br>
<button class="myButton2" onclick="myFunction()">Print this page &nbsp; <span><i class="fa fa-print"></i></span></button>
<br>
<br>
<br>
<table id="table-2" align="center">
<?php

$OrigiArray= array();

$replace = array("Ã‚", "Â¼", "Â½", "Ã¢â€¦â€œ", "-", "_", ":", "/", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "Ã¢â€¦", " g ","tablespoons", "Tablespoons", "Tablespoon", "tablespoon", "mls", "ml", "kgs", "kg", "grams", "gram", "tsp", "Ã¢", "â€¦", "bottles", "bottle", "Cups", "Cup", "TBS", "Pinchs", "Pinch", "pounds", "pound", "cups", "cup", "tbsp", "cloves", "clove", "of", "lbs", "lb", ".L", "Tbs.", "oz.", "(", ")", "about", "oz", "teaspoons", "teaspoon", "Tbsp", "pinchs", "pinch", "ounces", "ounce", "diced", "beaten", "minced", "finely", "thinly", "chopped", "divided", "drained", "&", "small", "approximately", ",,", ".", "celery", "from", "optional", "scrambled", "minced", "cans", "can", "cans", "C ", "About", "stened", "Ã‚", "SAUCE:", "crushed", "and", "lightly", "to taste", "fren ", ", cut into inch cubes", ", cut into chunks", ", more if you like", ", for serving", ", cut into in slices", ", broken in half", ", cut into inch pieces breasts", "halve", "to ", " s ", "T ", "+ ", "$", " ,", "ml_ ", "ml_", "mL ", "mL", "I used suat", "I used skim");

if(isset($obj01)!=NULL)
{
	for($i=0;$i<sizeof($obj01);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)))<=30 && strlen(str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)))!=null)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)));
				}
			}
			else
			{
			    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
			    array_push($OrigiArray,str_replace($replace, "", strtolower($obj01[$i]->ingredientDescription)));
			}
		}
	}
}

if(isset($obj02)!=NULL)
{
	for($i=0;$i<sizeof($obj02);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj02[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj02[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj02[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj02[$i]->ingredientDescription)));
				}
			}
		}
	}
}

if(isset($obj03)!=NULL)
{
	for($i=0;$i<sizeof($obj03);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj03[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj03[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj03[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj03[$i]->ingredientDescription)));
				}
			}
		}
	}
}

if(isset($obj11)!=NULL)
{
	for($i=0;$i<sizeof($obj11);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj11[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj11[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj11[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj11[$i]->ingredientDescription)));
				}
			}
		}
	}
}

if(isset($obj12)!=NULL)
{
	for($i=0;$i<sizeof($obj12);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj02[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj12[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj12[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj12[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj13)!=NULL)
{
	for($i=0;$i<sizeof($obj13);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj13[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj13[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj13[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj13[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj21)!=NULL)
{
	for($i=0;$i<sizeof($obj21);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj21[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj21[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj21[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj21[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj22)!=NULL)
{
	for($i=0;$i<sizeof($obj22);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj22[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj22[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj22[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj22[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj23)!=NULL)
{
	for($i=0;$i<sizeof($obj23);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj23[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj23[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj23[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj23[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj31)!=NULL)
{
	for($i=0;$i<sizeof($obj31);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj31[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj31[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj31[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj31[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj32)!=NULL)
{
	for($i=0;$i<sizeof($obj32);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj32[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj32[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj32[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj32[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj33)!=NULL)
{
	for($i=0;$i<sizeof($obj33);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj33[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj33[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj33[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj33[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj41)!=NULL)
{
	for($i=0;$i<sizeof($obj41);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj41[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj41[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj41[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj41[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj42)!=NULL)
{
	for($i=0;$i<sizeof($obj42);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj42[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj42[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj42[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj42[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj43)!=NULL)
{
	for($i=0;$i<sizeof($obj43);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj43[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj43[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj43[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj43[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj51)!=NULL)
{
	for($i=0;$i<sizeof($obj51);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj51[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj51[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj51[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj51[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj52)!=NULL)
{
	for($i=0;$i<sizeof($obj52);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj52[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj52[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj52[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj52[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj53)!=NULL)
{
	for($i=0;$i<sizeof($obj53);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj53[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj53[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj53[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj53[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj61)!=NULL)
{
	for($i=0;$i<sizeof($obj61);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj61[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj61[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj61[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj61[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj62)!=NULL)
{
	for($i=0;$i<sizeof($obj62);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj62[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj62[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj62[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj62[$i]->ingredientDescription)));
				}
			}
		}
	}
}
if(isset($obj63)!=NULL)
{
	for($i=0;$i<sizeof($obj63);$i++)
	{
		if(strlen(str_replace($replace, "", strtolower($obj63[$i]->ingredientDescription)))<=30)
		{
		    if($OrigiArray!=null)
			{
		        $check=0;
				foreach($OrigiArray as $value)
				{
			        similar_text($value,str_replace($replace, "", strtolower($obj63[$i]->ingredientDescription)),$p);
					if($p>=50)
					{
					    $check = $check+1;   
					}
			    }
				if($check==0)
				{
				    echo "<tr>"; echo "<td height='45px'>"; echo str_replace($replace, "", strtolower($obj63[$i]->ingredientDescription)); echo "</td>"; echo "</tr>";
					array_push($OrigiArray,str_replace($replace, "", strtolower($obj63[$i]->ingredientDescription)));
				}
			}
		}
	}
}
echo "</table>";

?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div id="space"></div>
<script>
function myFunction() {
       window.print();
}
</script>
<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="app2.js"></script>
<script src="app3.js"></script>
<script> 
</script> 
</body>
</html>
