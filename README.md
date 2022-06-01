
# Mid-project assignment for MFEE25 of [iSpan](https://www.ispan.com.tw/)
##### The project credits to [Alan](https://github.com/AlanCYL), [Remi](https://github.com/remi06vera) and [Jayna](https://github.com/jayna922).

### Description
* This is a back-end management website of meal vouchers which is team buying related.<br>
* The project's main implementation language is PHP and the database is mySQL. (There are HTML, CSS, JS, Bootstrap inside the project.)<br>
* The project has three parts of section incluing membership management by Alan, resturant management by Remi and meal voucher buying system by Jayna.<br>
* [Tutorial video of the project](https://www.youtube.com/watch?v=qbb2bZKukow) 

### How to use
* Please install project.sql in MySql database.<br>
  and change your own database infromation on db-connect.php<br> 
  
* ( manager-login.php ) This is for login.<br>
  Here's the login information:<br>
  for Admin =><br>
  account: 123<br>
  password: 123<br>
  for Resturant User =><br>
  account: villager@test.com<br>
  password: 111<br>

### Content Introduction
* member management system by [Alan](https://github.com/AlanCYL) ,starting from 10:45 of the tutorial video :*
There are 4 main page:
###### 1. create-user.php<br>
You may create new member and add in the database.<br>
It's an individual page outside the system.<br>
###### 2. user-list.php<br>
You may check all remaining member list in this page.<br>
Also can edit or delete the member information.<br>
There are functions of serching bar and sort of different category for convenient usage.<br>
This page also contain a member level inspection API which is level.php.<br>
It may check the membership level automatically by the amounts of the joined group.<br>
###### 3. groupHistoryP.php<br>
Inside the user-list.php, each member personal profile includes each joined group history.<br>
You may also check the status of the team-buying group as well.<br>
###### 4. user-list-coupon.php<br>
You may use this page for sending out coupon and insert into database.<br>
Just easily type the discount amount and reason then click.<br>
The coupon sending task is finished.<br>
This page also contain sevral category for sorting of and you may easily tick whom you wanna send for the coupon.<br>
You may also check about the coupon history on individual member page.<br>
<br>
* resturant management system by [Remi](https://github.com/remi06vera):*

* meal voucher buying system by [Jayna](https://github.com/jayna922):*


