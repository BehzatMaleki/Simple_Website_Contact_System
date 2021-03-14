# Simple_Website_Contact_System
This is a simple contact_us page manager for website. Follow stepes below to make it workes:

# Step 1:
Upload all files to your web server


# Step 2:
Create this database on your web server:

Database Name: messages_DB
Collate: utf8_general_ci

Table 1: 
  Name: messages_inbox
  Fields:
    MID (int, not null, primary key, AUTO_INCREMENT)
    Name (Text)
    Email (Text)
    Phone (Text)
    Message (Text)

Table 2: 
  Name: messages_saved
  Fields:	as messages_inbox

# Step 3:
Edit "connecting_db.php":
  $DB_ip = 'Your database IP address';
  $DB_user = 'Your database uesrname';
  $DB_pass = 'Your database password';

# Step 4:
Enjoy your messaging system.

* "contact_us.html" is the main page for messaging system.
** Clicking on the "Go to message control panel" link will lead you to the "message control panel"
*** The username ane password for the "message control panel"  is same as the username ane password of your database.

# Note:
This code is free for private or commercial use as long as you don't remove or change the copyright notes.<br><br>
Maleki B. Copyright ©2021<br>
BehzatMaleki@Gmail.com<br>
Github.com/BehzatMaleki
