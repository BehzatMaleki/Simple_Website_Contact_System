<!--
This code is free for private or commercial use as long as you don't remove or change the copyright notes.
Maleki B. Copyright ©2021
BehzatMaleki@Gmail.com
Github.com/BehzatMaleki
-->

<?php
//====== DB Setup ==-===//
$DB_ip = '127.0.0.1';
$DB_user = 'root';
$DB_pass = '';
//======================//
$DB_name = 'messages_DB';
$con = mysqli_connect($DB_ip,$DB_user,$DB_pass,$DB_name);
mysqli_set_charset($con,'utf8');
?>