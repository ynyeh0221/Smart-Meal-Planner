DEMO of SMART MEAL PLANNER: https://goo.gl/jXlyjd

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/index.png)

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/meals.png)

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/meals2.png)

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/analysis1.png)

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/analysis2.png)

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/analysis3.png)

![alt tag](https://github.com/ynyeh0221/Smart-Meal-Planner/blob/master/analysis4.png)

This is the final project of Data and Visual Analytics, Gatech. Smart Meal Planner--a personalized recipe recommendation app was designed and built based on more than 30000 recipes downloaded from Yummly API.

I am the front-end engineer of this project, and responsible for the register/login/logout system implementation, recommendation system app design, build, and data visualization (interactive personalized nutrition report) with HTML5/CSS3/JavaSript/JQUERY/AJAX/PHP/D3.js. These codes are validated by W3C Markup Validation Service.

This project got 100/100 of final grade.

Based on our surveys, 83% users will use our app, and think that our recommendation functions are better than that provided by Yummly.


HOW DOES SMART MEAL PLANNER WORK?

30000 recipes were obtained from Yummly API, cleaned by GoogleRefine, and stored on a MongoDB server on our backend. These recipes were converted into Boolean vectors having one entry per unique ingredient. The pairwise cosine similarity of recipes were computed, and then we clustered the recipes into 200 clusters.

For each recipe, the maximum similarity to a recipe in the set of favorites picked by the user is found. A 3SUM is run to get all possible sets of three recipes that add up to satisfy the daily recommended nutritional intake for the specific user, and the top seven scoring days that do not overlap in the clusters determined previously are greedy picked.
