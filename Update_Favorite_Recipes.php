<?php session_start(); ?>
<?php $_SESSION['edit']=2?>




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
		<title>Edit Favorite Recipes</title>
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
		</style>
		<style>
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
			 font-size:13px;
			 height:28px;
		 }
		 #weight
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:13px;
			 height:28px;
		 }
		 #height
		 {
		     font-family: 'Palanquin', sans-serif;
			 font-size:13px;
			 height:28px;
		 }

		 </style>

		 
		<script>

  		function display(str) {
    		if(str == '--')
			{
      			document.getElementById('label').className = "off";
      			document.login.American.className = "off";
      			document.login.Asian.className = "off";
				document.login.European.className = "off";
				document.login.Mexican.className = "off";
      			document.login.Southern.className = "off";
				document.login.Irish.className = "off";
				document.login.Chinese.className = "off";
				document.login.Indian.className = "off";
				document.login.French.className = "off";
      			document.login.Greek.className = "off";
				document.login.Italian.className = "off";
				document.login.Barbecue.className = "off";
				document.login.Cajun_Creole.className = "off";
				document.login.Japanese.className = "off";
				document.login.Kid.className = "off";
    		}
			else
			{
      			document.getElementById('label').className = "on";
      			if(str == 'American')
				{
        			document.login.American.className = "on";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Mexican')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "on";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Southern & Soul Food')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "on";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Asian/ Korean/ Thai')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "on";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Chinese')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "on";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Indian')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "on";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'French')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "on";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Greek')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "on";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Italian')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "on";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Irish')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "on";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Barbecue')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "on";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Cajun & Creole')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "on";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Japanese')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "on";
				    document.login.Kid.className = "off";
      			}
				else if(str == 'Kid-Friendly')
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "off";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Irish.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "on";
      			}
				else
				{
        		    document.login.American.className = "off";
        			document.login.Asian.className = "off";
					document.login.European.className = "on";
					document.login.Mexican.className = "off";
      				document.login.Southern.className = "off";
					document.login.Chinese.className = "off";
					document.login.Indian.className = "off";
					document.login.French.className = "off";
      				document.login.Greek.className = "off";
					document.login.Italian.className = "off";
					document.login.Barbecue.className = "off";
				    document.login.Cajun_Creole.className = "off";
					document.login.Japanese.className = "off";
				    document.login.Kid.className = "off";
      			}
    		}
  		}

		</script>
		
</head>
<body style="overflow-y:auto;overflow-x:hidden;"> 
	
<div id="c">
  
   <h1 class="title2">Edit Favorite Recipes</h1>			
  <a class="myButton" href="edit.php">Edit BMI &nbsp; <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span></a><br><br><br>		
  <form name="login" id="login" method="POST" action="add_preference.php">
  <table id="table-2" align="center">
	<tr >
	<td style="width:60%;text-align:center;padding:10px">
					<div>Select A Cuisine:</div><br>
					<select name="Cuisine" onChange="display(document.login.Cuisine.options[selectedIndex].text);">
 					<option value="" selected="1">--</option>
 					<option value="American">American</option>
 					<option value="Asian">Asian/ Korean/ Thai</option>
					<option value="Barbecue">Barbecue</option>
					<option value="Cajun_Creole">Cajun & Creole</option>
					<option value="Chinese">Chinese</option>
					<option value="European">English/ German/ Spanish/ Swedish</option>
					<option value="French">French</option>
 					<option value="Greek">Greek</option>
 					<option value="Indian">Indian</option>
					<option value="Irish">Irish</option>
					<option value="Italian">Italian</option>
					<option value="Japanese">Japanese</option>
					<option value="Kid">Kid-Friendly</option>
					<option value="Mexican">Mexican</option>
					<option value="Southern">Southern & Soul Food</option>
 					</select>
					<br>
 					<div id="label" class="off">Select A Meal:</div><br><br>
 					<select name="American" class="off">
 					<option value="Avocado-egg-salad-352486" selected="Avocado-egg-salad-352486">Avocado egg salad</option>
 					<option value="Bacon-Cheese-Fries-TasteOfHome">Bacon Cheese Fries TasteOfHome</option>
 					<option value="Marinated-Roasted-Red-Pepper-Grilled-Cheese-Sandwich-Closet-Cooking-54954">Marinated Roasted Red Pepper Grilled Cheese Sandwich Closet Cooking</option>
					<option value="Disappearing-buffalo-chicken-dip-297712">Disappearing buffalo chicken dip</option>
 					<option value="Prize-Winning-Baby-Back-Ribs-Allrecipes">Prize Winning Baby Back Ribs Allrecipes</option>
					<option value="Oven-fried-chicken-352485">Oven fried chicken</option>
					<option value="Balsamic-Roast-Beef-631076">Balsamic Roast Beef</option>
					<option value="Sweet-and-Tangy-Roasted-Pork-Tenderloin-472470">Sweet and Tangy Roasted Pork Tenderloin</option>
					<option value="Honey-and-Balsamic-Onions-Chicken-Skillet-475715">Honey and Balsamic Onions Chicken Skillet</option>
					<option value="Mustard_Glazed-Salmon-Martha-Stewart_1">Mustard Glazed Salmon Martha Stewart</option>
					<option value="Banana-pudding-369019">Banana pudding</option>
					<option value="Roasted-corn-with-cilantro-butter-351940">Roasted corn with cilantro butter</option>
					<option value="Pepper-Crusted-Filet-Mignon-508094">Pepper Crusted Filet Mignon</option>
					<option value="Green-bean-salad-with-walnuts_-parmesan-and-mint-302417">Green bean salad with walnuts, parmesan and mint</option>
					<option value="BLT-Wraps-472387">BLT Wraps</option>
					<option value="Artichokes-Allrecipes">Artichokes</option>
					<option value="Popovers-Allrecipes">Popovers</option>
					<option value="Peppermint-brownies-369318">Peppermint brownies</option>
					<option value="Slow-Cooker-Hawaiian-Sticky-Chicken-1336194">Slow Cooker Hawaiian Sticky Chicken</option>
					</select>
					<select name="Mexican" class="off">
					<option value="Mexican-Street-Corn-1256983" selected="Mexican-Street-Corn-1256983">Mexican Street Corn</option>
 					<option value="Cheese-Enchiladas-with-Red-Chile-Sauce-1336730">Cheese Enchiladas with Red Chile Sauce</option>
 					<option value="Steak-Tacos-1309962">Steak Tacos</option>
					<option value="Spicy-Avocado-Sauce-494724">Spicy Avocado Sauce</option>
 					<option value="Mint-and-melon-agua-fresca-372041">Mint and melon agua fresca</option>
					<option value="Slow-Cooker-Cheesy-Mexican-Chicken-1297305">Slow Cooker Cheesy Mexican Chicken</option>
 					<option value="Slow-cooker-mexican-pulled-pork-309170">Slow cooker mexican pulled pork</option>
 					<option value="Salsa-Verde-Chicken-Enchiladas-1268611">Salsa Verde Chicken Enchiladas</option>
					<option value="Mexican-Ceviche-with-Shrimp-1315214">Mexican Ceviche with Shrimp</option>
 					<option value="Gorditas-1042647">Gorditas</option>
					<option value="Fajita-Style-Quesadillas-637670">Fajita Style Quesadillas</option>
 					<option value="Elote-_Hot-Mexican-Corn-Dip_-679935">Elote Hot Mexican Corn Dip</option>
 					<option value="Huevos-rancheros-370964">Huevos rancheros</option>
					<option value="Carne-Guisada-con-Papas-_Mexican-Braised-Beef-with-Potatoes_-1336825">Carne Guisada con Papas--Mexican Braised Beef with Potatoes</option>
 					<option value="Shrimp-Cilantro-Burgers-with-Smoky-Chipotle-Lime-Guacamole-1326354">Shrimp Cilantro Burgers with Smoky Chipotle Lime Guacamole</option>
					</select>
					<select name="Southern" class="off">
					<option value="Southern-Shrimp-_-Cheese-Grits-1336202" selected="Southern-Shrimp-_-Cheese-Grits-1336202">Southern Shrimp Cheese Grits</option>
 					<option value="Southern-Fried-Okra-1282806">Southern Fried Okra</option>
					<option value="Southern-Biscuits-1238764">Southern Biscuits</option>
 					<option value="Sweet-Southern-Cornbread-1276970">Sweet Southern Cornbread</option>
					<option value="Easy-Fried-Green-Tomatoes-1301234">Easy Fried Green Tomatoes</option>
 					<option value="Southern-sausage-gravy-308032">Southern sausage gravy</option>
					<option value="Sweet-Southern-Cornbread-1276970">Sweet Southern Cornbread</option>
 					</select>
					<select name="Barbecue" class="off">
					<option value="Grilled-Lobster-Tails-1242114" selected="Grilled-Lobster-Tails-1242114">Grilled Lobster Tails</option>
 					<option value="Grilled-Bbq-Chicken-Breasts-1335246">Grilled Bbq Chicken Breasts</option>
					<option value="Cuban-Pork-Tenderloin-1302448">Cuban Pork Tenderloin</option>
 					<option value="Grilled-asparagus-with-double-lemon-and-parmesan-309888">Grilled asparagus with double lemon and parmesan</option>
					<option value="Brown-Sugar-_-Citrus-Grilled-Chicken-Breasts-1332068">Brown Sugar Citrus Grilled Chicken Breasts</option>
 					<option value="Salmon-with-Teriyaki-BBQ-Glaze-1315300">Salmon with Teriyaki BBQ Glaze</option>
					<option value="Grilled-Blooming-Onion-590188">Grilled Blooming Onion</option>
					<option value="Smoked-Tri-Tip-1267888">Smoked Tri Tip</option>
 					<option value="Grilled-Tomato-Salad-With-Feta-And-Basil-1297546">Grilled Tomato Salad With Feta And Basil</option>
					<option value="Balsamic-Steak-Skewers-1312884">Balsamic Steak Skewers</option>
 					<option value="Spicy-Chili-Garlic-Grilled-Trout-1286959">Spicy Chili Garlic Grilled Trout</option>
					<option value="Asian-Steak-Kebabs-1228591">Asian Steak Kebabs</option>
					<option value="Grilled-Lemon-Butter-Tilapia-894499">Grilled Lemon Butter Tilapia</option>
 					<option value="Maple-Bacon-Beer-Burgers-1035120">Maple Bacon Beer Burgers</option>
					<option value="Lemon-_-Spice-Grilled-Shrimp-779558">Lemon Spice Grilled Shrimp</option>
					<option value="Chicken-Satay-1320010">Chicken Satay</option>
					<option value="Grilled-Scallop-Piccata-1275867">Grilled Scallop Piccata</option>
 					</select>
					<select name="Cajun_Creole" class="off">
					<option value="Cajun-Wings-1335820" selected="Cajun-Wings-1335820">Cajun Wings</option>
 					<option value="Spicy-Southern-Jambalaya-1320133">Spicy Southern Jambalaya</option>
					<option value="Cajun-Shrimp-Quinoa-Casserole-1285453">Cajun Shrimp Quinoa Casserole</option>
 					<option value="Cajun-Gumbo-1334634">Cajun Gumbo</option>
					<option value="Healthy-Jambalaya-1317735">Healthy Jambalaya</option>
 					<option value="Cajun-Beans-and-Rice-1330193">Cajun Beans and Rice</option>
					<option value="Cajun-Chicken-Pasta-1334422">Cajun Chicken Pasta</option>
					<option value="Shrimp-Gumbo-with-Andouille-Sausage-1335223">Shrimp Gumbo with Andouille Sausage</option>
					<option value="Cajun-Chicken-and-Rice-Skillet-1320572">Cajun Chicken and Rice Skillet</option>
 					</select>
 					<select name="Asian" class="off">
 					<option value="Simple-Fried-Rice-1326278" selected="Simple-Fried-Rice-1326278">Simple Fried Rice</option>
 					<option value="Korean-Beef-Bowl-1315436">Korean Beef Bowl</option>
 					<option value="Mongolian-Beef-502197">Mongolian Beef</option>
 					<option value="Asian-Chicken-Noodle-Soup-1300938">Asian Chicken Noodle Soup</option>
					<option value="Asian-Burgers-with-Spicy-Coleslaw-1332436">Asian Burgers with Spicy Coleslaw</option>
					<option value="Shrimp-and-Broccoli-Stir-Fry-1319913">Shrimp and Broccoli Stir</option>
 					<option value="Har-Gow-1324819">Har Gow</option>
 					<option value="Sushi-Salad-with-Wasabi-Soy-Dressing-1334518">Sushi Salad with Wasabi Soy Dressing</option>
					<option value="Cumin-Lamb-1287247">Cumin Lamb</option>
					<option value="Tom-Kha-Kung-_Goong_-1330783">Tom Kha Kung Goong</option>
					<option value="PotStickers-1329410">PotStickers</option>
					<option value="Thai-Coconut-Chicken-Soup-1334065">Thai Coconut Chicken Soup</option>
					<option value="Thai-Yellow-Coconut-Curry-with-Chicken-and-Squash-1321493">Thai Yellow Coconut Curry with Chicken and Squash</option>
					</select>
					<select name="Japanese" class="off">
					<option value="Sliced-Beef-with-Enoki-Mushrooms---Japanese-Style-1336447" selected="Sliced-Beef-with-Enoki-Mushrooms---Japanese-Style-1336447">Sliced Beef with Enoki Mushrooms---Japanese-Style</option>
 					<option value="Chicken-Teriyaki-1286234">Chicken Teriyaki</option>
 					<option value="Japanese-Pork-Gyoza-474682">Japanese Pork Gyoza</option>
					<option value="Beef-Negimaki-1128838">Beef Negimaki</option>
 					<option value="Japanese-Fried-Chicken-1201187">Japanese Fried Chicken</option>
					<option value="Honey-teriyaki-salmon-314540">Honey teriyaki salmon</option>
					<option value="Tonkatsu-_Japanese-Pork-Cutlet_-573534">Tonkatsu Japanese Pork Cutlet</option>
					<option value="Beef-Teriyaki-496825">Beef Teriyaki</option>
					</select>
					<select name="Kid" class="off">
					<option value="Healthy-Chicken-Fingers-1326623" selected="Healthy-Chicken-Fingers-1326623">Healthy Chicken Fingers</option>
 					<option value="Easy-No-Knead_-No-Rise-Soft-Pretzels-_Kid-Friendly_too_-1282578">Easy No Knead, No Rise Soft Pretzels Kid-Friendly too</option>
 					<option value="Pumpkin-Churro-French-Toast-Sticks-1331539">Pumpkin Churro French Toast Sticks</option>
					<option value="Cookie-dough-topped-brownies-369109">Cookie dough topped brownies</option>
 					<option value="Chile-Colorado-Burritos-608961">Chile Colorado Burritos</option>
					<option value="Apple-Cinnamon-Loaf-682411">Apple Cinnamon Loaf</option>
					<option value="Skinny-green-tropical-smoothie-351991">Skinny green tropical smoothie</option>
					<option value="Crispy-chocolate-peanut-butter-cookie-dough-truffles-333571">Crispy chocolate peanut butter cookie dough truffles</option>
					<option value="Oreo-Pudding-Pops-749386">Oreo Pudding Pops</option>
					<option value="Baked-Parmesan-Zucchini-Sticks-530658">Baked Parmesan Zucchini Sticks</option>
					<option value="Sausage-Balls-Allrecipes">Sausage Balls</option>
					<option value="Oatmeal-Raisin-Cookies-I-Allrecipes">Oatmeal Raisin Cookies-I</option>
					<option value="The-Best-Crockpot-BBQ-Chicken-628400">The Best Crockpot BBQ Chicken</option>
					</select>
					<select name="Irish" class="off">
					<option value="Irish-Soda-Bread-1334758">Irish Soda Bread</option>
					<option value="Irish-Potato-Farls-Allrecipes">Irish Potato Farls</option>
					<option value="Irish-Colcannon-1303758">Irish Colcannon</option>
					<option value="IRISH-POTATO-SOUP-562967">IRISH POTATO SOUP</option>
					</select>
					<select name="Chinese" class="off">
					<option value="Chinese-Dumplings-_Potstickers_-1335890" selected="Chinese-Dumplings-_Potstickers_-1335890">Chinese Dumplings Potstickers</option>
 					<option value="Beef-And-Broccoli-1320780">Beef And Broccoli</option>
 					<option value="Slow-Cooker-Chinese-Three-Cup-Chicken-1335215">Slow Cooker Chinese Three Cup Chicken</option>
 					<option value="Orange-Chicken-1327985">Orange Chicken</option>
					<option value="Chinese-Orange-Beef-1334118">Chinese Orange Beef</option>
 					<option value="Chinese-Chicken-Salad-1309743">Chinese Chicken Salad</option>
 					<option value="Very-Popular-Bubble-Tea-Allrecipes">Very Popular Bubble Tea</option>
 					<option value="Chinese-Barbecued-Pork-_Char-Siu_-622609">Chinese Barbecued Pork Char-Siu</option>
					<option value="Oyster-Beef-with-Chinese-Broccoli-1257225">Oyster Beef with Chinese Broccoli</option>
					</select>
					<select name="Indian" class="off">
					<option value="Indian-Raita-1308539" selected="Indian-Raita-1308539">Indian Raita</option>
					<option value="Indian-Butter-Chicken-1305353">Indian Butter Chicken</option>
 					<option value="Indian-Curried-Poached-Eggs-1308482">Indian Curried Poached Eggs</option>
 					<option value="Indian-Chicken-Tikka-Masala-1308441">Indian Chicken Tikka Masala</option>
 					<option value="Indian-Basmati-Rice-Seasoned-with-Garam-Masala-1308569">Indian Basmati Rice Seasoned with Garam Masala</option>
					<option value="Mango-Lassi-Simply-Recipes-43078">Mango Lassi Simply Recipes</option>
					<option value="Crock-Pot-Butter-Chicken-1313790">Crock Pot Butter Chicken</option>
 					<option value="Baby-Potatoes-Green-Gravy-1334432">Baby Potatoes Green Gravy</option>
 					<option value="Indian-Naan-1308438">Indian Naan</option>
 					<option value="Indian-Chai-Oatmeal-1308537">Indian Chai Oatmeal</option>
					<option value="MAKKAN-PEDA---A-DELICIOUS-DIWALI-SWEETS-1335282">MAKKAN PEDA--A DELICIOUS DIWALI SWEETS</option>
 					<option value="Skinny-chicken-tikka-masala-352197">Skinny chicken tikka masala</option>
 					<option value="Tandoori-Chicken-1233470">Tandoori Chicken</option>
 					</select>
					<select name="French" class="off">
 					<option value="French-Onion-Soup-1322563" selected="French-Onion-Soup-1322563">French Onion Soup</option>
 					<option value="French-Crepes-1003539">French Crepes</option>
 					<option value="Blueberry-Clafoutis-1301485">Blueberry Clafoutis</option>
					<option value="Tarte-Au-Citron-761647">Tarte Au Citron</option>
					<option value="Quiche-Lorraine-Simply-Recipes-42565">Quiche Lorraine Simply Recipes</option>
 					<option value="Crepes-Suzette-1333681">Crepes Suzette</option>
 					<option value="The-French-Laundry_s-Gougeres-1231449">The French Laundry's Gougeres</option>
					<option value="Mussels-Mariniere-458273">Mussels Mariniere</option>
					<option value="Croissants-1317130">Croissants</option>
 					<option value="Cheese-Souffle-Recipe-Martha-Stewart">Cheese Souffle Recipe Martha Stewart</option>
 					<option value="Cheddar-Gougeres-_Savory-Cheese-Cream-Puffs_-1302859">Cheddar Gougeres Savory Cheese Cream Puffs</option>
					<option value="Creme-Brulee-Cupcakes-1035261">Creme Brulee Cupcakes</option>
					</select>
					<select name="Greek" class="off">
 					<option value="Greek-Pasta-Salad-with-Red-Wine-Vinaigrette-1190128" selected="Greek-Pasta-Salad-with-Red-Wine-Vinaigrette-1190128">Greek Pasta Salad with Red Wine Vinaigrette</option>
					<option value="Greek-Yogurt-Chicken-Salad-596757">Greek Yogurt Chicken Salad</option>
 					<option value="Very-greek-grilled-chicken-310056">Very greek grilled chicken</option>
 					<option value="Greek-Meatball-Pizza-1328767">Greek Meatball Pizza</option>
					<option value="Greek-Quesadillas-1292083">Greek Quesadillas</option>
					<option value="Greek-Goddess-Dip-1336445">Greek Goddess Dip</option>
					<option value="Greek-Chicken-Pita-1321541">Greek Chicken Pita</option>
 					<option value="Greek-Style-Salmon-with-Avocado-Tzatziki-1320421">Greek Style Salmon with Avocado Tzatziki</option>
 					<option value="Greek-Style-Cucumber-Salad-1317506">Greek Style Cucumber Salad</option>
					<option value="Greek-Shrimp-with-Tzatziki-Sauce-1329159">Greek Shrimp with Tzatziki Sauce</option>
					<option value="Greek-Pasta-Casserole-1330780">Greek Pasta Casserole</option>
 					<option value="Greek-Pastitsio-1327244">Greek Pastitsio</option>
					<option value="Low-Carb-Greek-Tzatziki-1175373">Low Carb Greek Tzatziki</option>
					</select>
					<select name="Italian" class="off">
 					<option value="Italian-Herb-Baked-Meatballs-1323111" selected="Italian-Herb-Baked-Meatballs-1323111">Italian Herb Baked Meatballs</option>
					<option value="Mushroom-_-Pancetta-Spaghetti-1312126">Mushroom Pancetta Spaghetti</option>
 					<option value="Italian-Sausage-and-Basil-Pizza_-1314799">Italian Sausage and Basil Pizza</option>
 					<option value="Prosciutto_-Pesto-_-Fresh-Mozzarella-Panini-1262612">Prosciutto Pesto Fresh Mozzarella Panini</option>
					<option value="Spinach-Lasagna-Roll-Ups-1316796">Spinach Lasagna Roll Ups</option>
 					<option value="Tiramisu-461037">Tiramisu</option>
					<option value="Sausage-Ragu-1332195">Sausage Ragu</option>
 					<option value="Pesto-Chicken-Alfredo-1318896">Pesto Chicken Alfredo</option>
 					<option value="Summer-Garden-Risotto-1331100">Summer Garden Risotto</option>
					<option value="Risotto-with-Radicchio_-speck-and-balsamic-vinegar-1336344">Risotto with Radicchio speck and balsamic vinegar</option>
 					<option value="Wild-Boar-Italian-Sausage-with-Spicy-Tomato-Sauce-1331887">Wild Boar Italian Sausage with Spicy Tomato Sauce</option>
					<option value="Creamy-Italian-Pasta-Skillet-1251081">Creamy Italian Pasta Skillet</option>
 					<option value="Creamy-Italian-Orzo-1325922">Creamy Italian Orzo</option>
					</select>
					<select name="European" class="off">
					<option value="German-potato-pancakes-_for-Oktoberfest_-1309211" selected="German-potato-pancakes-_for-Oktoberfest_-1309211">German potato pancakes for Oktoberfest</option>
					<option value="Versunken-Apfelkuchen-_German-Apple-Cake_-1316277">Versunken Apfelkuchen-German Apple Cake</option>
					<option value="Traditional-German-Schnitzel-1314408">Traditional German Schnitzel</option>
					<option value="Grandmother_s-German-Pancakes---Grain-Free-519386">Grandmother's German Pancakes--Grain Free</option>
					<option value="Spanish-Omelette-With-Chorizo-And-Sweet-Potato-1333388">Spanish Omelette With Chorizo And Sweet Potato</option>
 					<option value="Spanish-Seafood-Crostini-1329248">Spanish Seafood Crostini</option>
					<option value="Spanish-Spaghetti-with-Olives-1325701">Spanish Spaghetti with Olives</option>
 					<option value="Fried-Calamari-507631">Fried Calamari</option>
					<option value="Swedish-Tea-Ring-1336760">Swedish Tea Ring</option>
 					<option value="Anna_s-Amazing-Easy-Pleasy-Meatballs-Over-Buttered-Noodles-Allrecipes">Anna_s Amazing Easy Pleasy Meatballs Over Buttered Noodles Allrecipes</option>
					<option value="Yorkshire-pudding-369552">Yorkshire pudding</option>
 					</select>
					</td>
					<td style="text-align:center">
					<button class="myButton3" type="submit" style="font-size:80%;">Add</button><br><br><input class="myButton3" style="font-size:80%;" onClick="javascript:location.href='<?php if($_SESSION['lastpage']==1){echo "recipes.php";} else if($_SESSION['lastpage']==2) {echo "recipes_nu.php";} else {echo "recipes_sl.php";} ?>'" value="Back">
					</td>
 					</tr>
					<tr style="border:none;"><td colspan="2" style="width:100%"><iframe src="favorite.php" height="98%" width="100%" style="padding:5px; border:solid:2px double rgba(255,255,255,0.5); border-radius:10px;" ></iframe></td></tr>
  </table>  
  </form>
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
