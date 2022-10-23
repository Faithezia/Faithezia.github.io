	// ______________________________________________DELETE______________________________________________________________
	if(isset($_POST['submit1'])) {
		$check = mysqli_query($db, "SELECT * FROM `books` WHERE bid='$_POST[search]';");
		if(mysqli_num_rows($check)==0){
			?>
		<div class="alert alert-danger" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			WRONG BOOK ID! PLEASE TRY AGAIN.
		</div>
			<?php
		}
		else{
			mysqli_query($db, "DELETE FROM `books` WHERE bid='$_POST[search]';");
				?>
				<script type="text/javascript">
				  window.location("books.php");
				</script>
				<div class="alert alert-success" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			DELETED SUCCESSFULLY!
				</div>
				 <?php
		}
		}

