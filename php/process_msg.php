<!--
This code is free for private or commercial use as long as you don't remove or change the copyright notes.
Maleki B. Copyright ©2021
BehzatMaleki@Gmail.com
Github.com/BehzatMaleki
-->

<?php
session_start();
include "connecting_db.php";

if(isset($_POST['submit_msg'])){
	//New message
    $query = "insert into messages_inbox (Name,Email,Phone,Message) values ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['message']."')";
    mysqli_query($con,$query);
	mysqli_close($con);
	echo "<div align='center'><font color='red'>Message sent successfully!</font></div>";
	echo '<meta http-equiv="refresh" content="1;url=../contact_us.html" />';
}

if(isset($_SESSION['logged']) && isset($_GET['ACT'])){
	//Save a message
	if($_GET['ACT']=='sv' && $_GET['TBL']=='mi'){
		$query = "insert into messages_saved (Name,Email,Phone,Message) values ('".$_GET['Name']."','".$_GET['Email']."','".$_GET['Phone']."','".$_GET['Message']."')";
		mysqli_query($con,$query);
		$query= "delete from messages_inbox where MID='".$_GET['ID']."'";
		mysqli_query($con,$query);
		echo '<meta http-equiv="refresh" content="0;url=control_msg.php" >';
	}

	//Delete from inbox
	if($_GET['ACT']=='dlt' && $_GET['TBL']=='mi'){
		$query= "delete from messages_inbox where MID='".$_GET['ID']."'";
		mysqli_query($con,$query);
		echo '<meta http-equiv="refresh" content="0;url=control_msg.php" >';
	}

	//Delete a saved message
	if($_GET['ACT']=='dlt' && $_GET['TBL']=='ms'){
		$query= "delete from messages_saved where MID='".$_GET['ID']."'";
		mysqli_query($con,$query);
		echo '<meta http-equiv="refresh" content="0;url=control_msg.php" >';
	}
}

?>