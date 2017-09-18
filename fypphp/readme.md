#**Ust Server Connection**   
DB user_name: wil1
---
DB password: WLdb58m2

###Secure Shell client

    host: csl2wk01.cse.ust.hk
    username: itsc
    port: 22
    authentication: password
    then type itsc password

###In cslwk01.cse.ust.hk

    ssh wwwfyp.cse.ust.hk
    then type itsc password

###Project Directory
    cd /project/wil1/htdocs/fitnessfighter


//Gordon Work 


###cardio datum implmentation.

###Cardio datum extracted and implmeneted into database.


###updated user info(access token) each time


###update the server each time

DB(ACCESS TOKEN,ID)    ---->   FITBIT SERVER   ---->  PHP SCRIPT (CRON)   ---> DB FITBIT_ACT

FLOW :  

SELECT ALL ACCESS TOKEN , ID 

-->

RUN FITBIT.PHP/STH LIKE THAT

-->

EXTRACT VALUE FROM JSON.(JUST LIKE FIRST.PHP)

--->

ADD IT INTO FITBIT ACT DB

###Add friend System

Make sure user have base family first,otherwise it cannot add.
Make sure family is established.
Add friend system could run eff if message send well.


--->

Keep track the user 's register or before


--->

Mail Page

--->

User Login Page

--->

chart.js and chartist.js application

--->

data connection to the user and searching function.








