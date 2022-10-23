<?php 
 include "connection.php";
// BORROWING BOOKS SIDE
if(isset($_POST['submit1']))
	{
	if(isset($_SESSION['login_user']))
	{
		$r = mysqli_query($db, "SELECT * FROM `books` WHERE `bid` like '%$_POST[search]%' ");
			if(mysqli_num_rows($r)==0) {
			?>
			<div class="alert alert-danger" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			WRONG BOOK ID! Please try again.
			</div>
			<?php 
			}
		$not_available = '<p style="background-color: red;">Not-available</p';
		$p = mysqli_query($db,"SELECT `status` FROM `books` WHERE bid='$_POST[search]' ");
		 while($row=mysqli_fetch_assoc($p)){
     		if($row['status']==$not_available) {
			?>
			<div class="alert alert-danger" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			Sorry, but this book is not available.
			</div>
			<?php       			 
    	 	}
   				 
		 else{
			mysqli_query($db, "INSERT INTO request VALUES('','$_SESSION[login_user]','$_POST[search]' ,'' ,'','','');");
			?>
				<div class="alert alert-success" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			Your request is on the proccess. Please wait for approval!
				</div>
			<?php
		}
		}
	}			
	}		

?>