DEMO of SMART MEAL PLANNER: https://goo.gl/jXlyjd

This is the final project of Data and Visual Analytics, Gatech. Smart Meal Planner--a personalized recipe recommendation app was designed and built based on more than 30000 recipes downloaded from Yummly API.

I am responsible for the recommendation system app design, build, and nutrition intake analysis visualization with HTML5/CSS3/JavaSript/JQUERY/AJAX/PHP/D3.js. These codes are validated by W3C Markup Validation Service (https://validator.w3.org/.)

This project got 100/100 of final grade.

83% users will use our app, and think that our recommendation functions are better than that provided by Yummly.


HOW DOES SMART MEAL PLANNER WORK?

30000 recipes were obtained from Yummly, cleaned by GoogleRefine, and stored on a MongoDB server on our backend. These recipes were converted into Boolean vectors having one entry per unique ingredient. The pairwise cosine similarity of recipes were computed, and then we clustered the recipes into 200 clusters.

For each recipe, the maximum similarity to a recipe in the set of favorites picked by the user is found. A 3SUM is run to get all possible sets of three recipes that add up to satisfy the daily recommended nutritional intake for the specific user, and the top seven scoring days that do not overlap in the clusters determined previously are greedy picked.

