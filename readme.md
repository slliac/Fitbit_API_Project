# FYP 2016  -  2017 
# HKUST Computer Science and Engineering Department 
# Topic : Fitbit API related Family traced project

Group Mates :

<h3>me : Li Sing Lun(20317033)</h3>  

Man Ho Yin (20310267) 

Chan Ho Fung (20310889) 

Yeung Chun Tong(20309115) 

Advised  by Prof Wilfred Ng

# Objective

Setting a regular exercise goal is important for everyone. In this project we built an Android app and a web portal that uses activity-tracking smart bracelets to collect the number of steps people take every day. With data collected from these bracelets, the app and portal help families monitor how much exercise each member of the family is doing each day. To provide motivation, the Android application also includes a battle game which utilizes the player’s exercise data to build up the fighting power of his or her game character. The name of the app is Fitness Fighter. Since the game is using family-based data, it is designed for family members to encourage each other to exercise regularly so as to win the game. Ultimately, we hope it will provide enough motivation to help people stay healthy and change their attitudes about exercise. To produce this game app, we achieved the following objectives:

1. Automatically retrieve players’ activity data from their smart bracelets, synchronize (sync) it with the Fitbit database and then store it on our database server.

2. Develop an Android game app called Fitness Fighter that allows users to view their exercise activity, gain fighting power according to their activity, compare their activity to the activity of family members and play short fun games.

3. Develop a battle system that is fun.

4. Develop a ranking system to allow families to compete with other families.

5. Develop an attractive user interface (UI).

The most challenging objective was automatically syncing smart bracelet data with the Fitbit database and then store it on our database server, because it needs to be done every day. If only one family member forgets to synchronize his or her smart bracelet with the Fitbit database, then his or her families’ data will not be accurate in the family-based comparison. To deal with this, we have remind users to sync their smart bracelets every day, and we also wrote a PHP server script that automatically grabs the user data from the Fitbit server and store it in our own database.

# Theory

# Auto synchronization everyday

We set analysis.php that sent request to the Fitbit server by the updated access token and id as user updated each time. Throughout OAuth 2.0, we retrieved the cardio and physical datum from server in JSON format. In which, the analysis.php has different fragment to divided various and complicated JSON into different temporary session array. Thanks to Codeigniter framework, data will be retrieved then implemented into different database table.


In case for making the datum maintained at least in the same day , therefore both update would running in the same times, for make sure the datum would at least update in the same days. But the user want to see the most updatest result for himself , only that user would updated in the most updated date.

# Background

Developed with Codeigniter, our web adopted MVC approach for website backbone, and with a better manner for the connection of FITBIT server and our school provided database (MySQL). It provided a clear data management framework for data flow. For example, it provided an alternative way for managed those data Form actions.

UI Framework not only respect to the outlook but also data management in a formatted outlook.

For datum description in chart format, I would recommend to use the chart.js for described the datum in a user friendly mode also with animation as well as users login PHP page by local PC. Therefore, animation could be performed for enhanced overall outlook.

For general outlook, PHP would mainly adopt Google Material instead of bootstrap. For further data manipulation, it would be adopts Kendo UI or EasyUI. Sketch and pingedo is recommended to be used for the professional web design. For code background implementation of web, using Codekit as framework and CodeIgniter as backbone would be recommended.

#  Architecture

Inherited from Fitbit Fighter Game developed by FYP21,the Fitbit Fighter dashboard aims for provided a dynamic data visualization for user 's family and their friends.Including they could easily compare their game point and health datum between their friends and their family. Due by limitation from android gaming, data visualization are looked as unclear and cannot maximize the characteristics of data visualize. Therefore, Fitbit fighter dashboard 's goal is provided a fruitful and user oriented dashboard for PC Users that they didn’t have memory allocation problem instead of those android users. 

Developed with Codeigniter, our web adopted MVC approach for website backbone, and with a better manner for the connection of FITBIT server and our school provided database(MySQL).It provided a clear data management framework for data flow. For example, it provided an alternative way for managed those data Form actions. 

Throughout friend search function, the users could view their family and friend 's profile easily. You might add your friend or add them into your family easily according to your condition. You may compared your friends and also his family datum comparison after you added him as friend or family or join their family. Friend adding system what mores can connect to the game application, which is also one of the alternative ways for adding friend. 

With the support from data visualization d3.js based framework such as chart.js,chartist.js,xchart.js,c3.js,data visualization are dynamic and some would shown on animation mode. The backbone UI Background are supported by Google material lite(MDL) which adapted the chicest design principle purposed by Google Inc. The comfort and effect of visualization put on the first place for our dashboard design.  

The datum would be compared with semitransparent approach that users had a clear sight for all data flow of his family. And the hover would appear the actual data that users would know the exact data going. 

We would likely to using merge approach in case for solving the data retrieve issue. The first approach we applied is retrieved all datum from the Fitbit ‘s server since it’s important for overall data analysis (familyinfo.php). However, as our products is mainly designed for family instead for personal, therefore, it ‘s quite difficult to specifically update the person ‘s family ‘s data at the same time since different user ‘s sync time would be different. In case for solving this problem, we combined with the approach to update all the user ‘s data in one of the specific time (for example midnight) and it might ensure all the users at least compared datum in the same day. For access token problem, Since it’s given that all users may update the datum all the time, fb_access_token is dynamic and changed after 1 days. Therefore we cannot develop a continuous update.Therefore,each time update would forced the user update his access token automatically and make sure server used the freshest access token for retrieve the most updatest datum. 

Our design is applied materialize.css in which obeys the design principles announced by Google.Inc, in case combined with android version, we could likely to applied same design approach instead of using other design frameworks. 

The first.php would either shown the datum for personal or family size according to your family ‘s size, since the main objective of portal is for family to check his recent datum and given them to do datum analysis. Therefore, it would have different mathematical comparison such as mean, average, different type of statistic graph which could fulfilled the things that android version didn’t clearly mention and big picture for user. 

And more detailed datum had provided in case the datum had classify as physical and cardio, since more and more people are demanding health of heart datum, therefore php dashboard view that cardio datum and physical datum are equally important foreach users. 

For making the analysis being user friendly and interesting, we applied the amcharts and physis.js operation, the bar can be destroyed by throwing bird object. This approach are similarly to “Angry Bird” game as Rovio developed, because some users may not satisfy with their results. It might one of funny approach for negative energy and emotion releasing. 

In case, for forcing the users doing the sport instead of just releasing those negative energy, the animal for each family ‘s level is counted by his family ‘s health datum, if the family is observed being a healthy lifestyle(we set it as >15000 for each month),then his family might get smart bird for destroy those negative datum, since the smart ‘s bird friction is reduced ½ than normal bird, therefore the bird would bombed in the fastest way than normal bird. If the family healthy datum is around 10000 to 15000 , their family might get the normal angry bird, otherwise family only get the pig as the bomb since pig ‘s friction is 2 times than the normal angry bird, so the user is quite difficult to destroy the datum from this case. 

Family datum are planned to analysis in an interesting way as Professor Ng mentioned, we are likely to set up a tiny small game for given user destroy their bad datum as one of emotion releasing. And also we would likely to comparing whole family’s running distance using some special indicator such as height of Fuji Mountain, size of Hong Kong etc. 



<h1>Directory and My work </h1>

# Web portal Side  <b>(My part)</b>
fypphp -- Php Web portal source code 

# wildb.sql --- sql database binaries <b>(My part)</b>

# Android Side

Fitbit --- Android Source code (Other)
