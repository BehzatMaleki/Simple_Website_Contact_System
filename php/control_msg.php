<!--
This code is free for private or commercial use as long as you don't remove or change the copyright notes.
Maleki B. Copyright ©2021
BehzatMaleki@Gmail.com
Github.com/BehzatMaleki
-->

<?php
	session_start();
	include "connecting_db.php";
?>
<html lang="en">
    <head>
		<style>
		html, body {height:100%}

		.table {
		  border-collapse: collapse;
		  text-align: center;
		}
		
		.table th {
		  padding: 5px;
		  border-right: 1px solid #1C8F20;
		  border-left: 1px solid #1C8F20;
		  background-color: #4CAF50;
		  color: white;
		}
		.table td{
		  padding: 5px;
		  border-right: 1px solid #ccc;
		  border-left: 1px solid #ccc;
		}
		.table tr:nth-child(even){background-color: #e2e2e2;}
		.table tr:hover {background-color: #9CFFA0;}
		</style>
        <meta charset="utf-8" />
    </head>
    <body>
		<table style="width:100%;height:100%;">
		  <tbody>
			<tr>
			  <td>
				<div align='center'>
					<?php
						echo "<form name='f1' method='post' action=''>";
						if(isset($_SESSION['logged']) && $_SESSION['logged']=="yes"){
							echo "<h3 style='color:red'>".$DB_user."@".$DB_name."&nbsp;<input type='submit' name='ext' value='Exit'></h3><p>&nbsp;</p>";
						}

						if(isset($_SESSION['logged']) && $_SESSION['logged']=="yes"){
							$msg= "";
							
							//Inbox table
							$msg= $msg."<h3><font color='blue'>Inbox:<font></h3><table class='table'><thead><tr align='center'><th><b>Name</b></th><th><b>Email</b></th><th><b>Phone</b></th><th><b>Message</b></th><th><b>Actions</b></th></tr></thead><tbody>";
							$query = "select * from messages_inbox order by MID desc";
							$result = mysqli_query($con, $query);
							while($rows = mysqli_fetch_array($result)){
								$msg= $msg."<tr><td>".$rows['Name']."</td><td>".$rows['Email']."</td><td>".$rows['Phone']."</td><td>".$rows['Message']."</td><td><a href='process_msg.php?ACT=sv&TBL=mi&ID=".$rows['MID']."&Name=".$rows['Name']."&Email=".$rows['Email']."&Phone=".$rows['Phone']."&Message=".$rows['Message']."'>Save</a>&nbsp;<a href='process_msg.php?ACT=dlt&TBL=mi&ID=".$rows['MID']."'>Delete</a></td></tr>";
							}
							
							//Saved messages table
							$msg= $msg."</tbody></table><p></p><h3 style='padding-top:25px;'><font color='blue'>Saved Messages:<font></h3><table class='table'><thead><tr align='center'><th><b>Name</b></th><th><b>Email</b></th><th><b>Phone</b></th><th><b>Message</b></th><th><b>Actions</b></th></tr></thead><tbody>";
							$query = "select * from messages_saved order by MID desc";
							$result = mysqli_query($con, $query);
							while($rows = mysqli_fetch_array($result)){
								$msg= $msg."<tr><td>".$rows['Name']."</td><td>".$rows['Email']."</td><td>".$rows['Phone']."</td><td>".$rows['Message']."</td><td><a href='process_msg.php?ACT=dlt&TBL=ms&ID=".$rows['MID']."'>Delete</a></td></tr>";
								
							}
						}else{
							//Login form
							$msg= "<p align='center'>User Name: <input type='text' name='uname'></p><p align='center'>Password: <input type='password' name='pwd'></p><p align='center'><input type='submit' name='entr' value='Enter'></p>";
						}
						
						//Login
						if(isset($_POST['entr'])){
							if (($_POST['uname']==$DB_user) && ($_POST['pwd']==$DB_pass)){
								$_SESSION['logged']="yes";
								$msg= "";
								echo '<meta http-equiv="refresh" content="0;url=control_msg.php" >';
							}else{
								$msg= $msg."<font color='red'>Incorrect username or pass!</font><br><br>";
							}
						}

						//Exit
						if(isset($_POST['ext'])){
							$_SESSION = array();
							session_destroy();
							echo '<meta http-equiv="refresh" content="0;url=control_msg.php" >';
						}

						echo "<div align='center' style='width:100%;height:250px'> $msg </div>";  
						echo "</form>";
					?>
				</div>
			  </td>
			</tr>
		  </tbody>
		</table>
    </body>
</html>