Steps to Using the Air Pollution Site with the Database

1) Create a new database in phpMyAdmin. Leave this database empty. 

2) Fill in the form that appears when you first go onto the site using the localhost/AirPollutio_Website address (i.e. database-setup.php)
    - Database Name should be the name of the database that has been created, preferably air_pollution.
    - Database Username should be your phpMyAdmin username which can be found in the "User Accounts" tab of the Home in the phpMyAdmin interface
    - Database Host should be the your phpMyAdmin host name which can be found in the "User Accounts" tab of the Home in the phpMyAdmin interface
    - Database Password should be your phpMyAdmin password which can be found in the "User Accounts" tab of the Home in the phpMyAdmin interface

3) Follow the directions on the database-setup.php page

*) What happens is that based on what you enter into the form fields on the database-setup page, the host, user, pass, and dbname values in config/config.ini will be filled.
    These values are then used to establish a connection to the created database. And then to dump the database tables from air_pollution.sql into the created database. 

*) This process is to be repeated each time the website is used. 

4) Once done using the website, close all instances of the site in your browser. Then proceed to place the value of check.txt to "No" where the value is equal to "Yes".
    This file is used to determine whether the database has been setup and a connection established and whether the user can tehn proceed to using the site as normal. 
    Then clear away the values placed in config/config.ini for the "host =", "user =", "pass=", and "dbname="
