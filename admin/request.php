
<?php
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://kit.fontawesome.com/e4c09f0222.js" crossorigin="anonymous"></script>
	<style type="text/css">

body {
  font-family: courier;
  transition: background-color .5s;
}

.input-group {
	display: flex;
	width: 80%;
	margin: 5% 0% 0% 10%;
}

.table{
	font-weight: bold;
	table-layout: auto;
	}

.btn-success, .btn-danger{
	display: inline-block;
	margin: 0 0 0 10px;
	font-size: 16px;

}	
	</style>

</head>
<body>
	<!--______________________________________________Search bar_______________________________________________________-->

<form class="navbar-form" method="post" name="form1">
<div class="input-group">
  <input type="search" class="form-control rounded" name="search" placeholder="Search for request..." aria-label="Search" aria-describedby="search-addon" required="">
  <button type="submit" name="submit" class="btn btn-outline-primary">search</button>
</div>

</form>
	<h1 style="text-align: center; margin-top: 30px; ">List of requests</h1>
	<?php

		$id = 0;
		if(isset($_POST['submit'])) {
			$q = mysqli_query($db, "SELECT * FROM `request` WHERE `booktitle` like '%$_POST[search]%' OR `author` like '%$_POST[search]%' OR  `first` like '%$_POST[search]%' OR `last`like '%$_POST[search]%' OR `address` like '%$_POST[search]%' OR `username`like '%$_POST[search]%' ");
			if(mysqli_num_rows($q)==0) {
				?>
				<div class="alert alert-dark" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			Sorry! No user found. Try to search again.
				</div>
				<?php
			}
			else {
			echo "<table class = 'table table-bordered table-hover'>";
				echo "<tr style = 'background-color: #6db6b9e6;'>";
					// echo "<th>";		echo "USER ID";						echo "</th>";
				 	echo "<th>";		echo "BOOK TITLE";				echo "</th>";
				 	echo "<th>";		echo "BOOK AUTHOR";				echo "</th>";
					echo "<th>";		echo "FIRST NAME";				echo "</th>";
					echo "<th>";		echo "LAST NAME";					echo "</th>";
					echo "<th>";		echo "POSITION";					echo "</th>";
					echo "<th>";		echo "ADDRESS";						echo "</th>";
					echo "<th>";		echo "NUMBER";						echo "</th>";
					// echo "<th>";		echo "USERNAME";					echo "</th>";
					echo "<th>";		echo "ACCEPT/DECLINE";		echo "</th>";
				echo "</tr>";
			while($rows = mysqli_fetch_assoc($q)) {
				include "delete.php";
				$approve = "<a href='request.php?ids=$rows[id];'><button type='submit' name='approve_button' class='btn btn-success btn-lg'><i class='fa-solid fa-thumbs-up'></i></button></a>";

 				$disapprove = "<a href='request.php?id=$rows[id];'><button type='submit' name='disapprove_button' class='btn btn-danger btn-lg'>
          <i class='fa-solid fa-thumbs-down'></i></button></a>";
				echo "<tr>";
					// echo "<td>";	echo $rows['id'];					echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['author'];			echo "</td>";
					echo "<td>";	echo $rows['first'];			echo "</td>";
					echo "<td>";	echo $rows['last'];				echo "</td>";
					echo "<td>";	echo $rows['position'];		echo "</td>";
					echo "<td>";	echo $rows['address'];		echo "</td>";
					echo "<td>";	echo $rows['number'];			echo "</td>";
					// echo "<td>";	echo $rows['username'];		echo "</td>";
				  echo "<th>";	echo $approve; echo $disapprove;echo "</th>";
				echo "</tr>";
			}
	include "approve.php";
			echo "</table>";		
				}
			}	

				/* If the button is not pressed. */
			else {
		$res = mysqli_query($db,"SELECT * FROM `request` ORDER BY `request`.`first` ASC;");
		//Table header
		echo "<table class = 'table table-bordered table-hover'>";
		echo "<tr style = 'background-color: #6db6b9e6;'>";
					// echo "<th>";		echo "USER ID";						echo "</th>";
					echo "<th>";		echo "BOOK TITLE";				echo "</th>";
					echo "<th>";		echo "BOOK AUTHOR";				echo "</th>";
					echo "<th>";		echo "FIRST NAME";				echo "</th>";
					echo "<th>";		echo "LAST NAME";					echo "</th>";
					echo "<th>";		echo "POSITION";					echo "</th>";
					echo "<th>";		echo "ADDRESS";						echo "</th>";
					echo "<th>";		echo "NUMBER";						echo "</th>";
					// echo "<th>";		echo "USERNAME";					echo "</th>";
					echo "<th>";		echo "ACCEPT/DECLINE";		echo "</th>";
		echo "</tr>";

		while($rows = mysqli_fetch_assoc($res)) {
			include "delete.php";
				$approve = "<a href='request.php?ids=$rows[id];'><button type='submit' name='approve_button' class='btn btn-success btn-lg'><i class='fa-solid fa-thumbs-up'></i></button></a>";

 				$disapprove = "<a href='request.php?id=$rows[id];'><button type='submit' name='disapprove_button' class='btn btn-danger btn-lg'>
          <i class='fa-solid fa-thumbs-down'></i></button></a>";
			echo "<tr>";
					// echo "<td>";	echo $rows['id'];					echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['author'];			echo "</td>";
					echo "<td>";	echo $rows['first'];			echo "</td>";
					echo "<td>";	echo $rows['last'];				echo "</td>";
					echo "<td>";	echo $rows['position'];		echo "</td>";
					echo "<td>";	echo $rows['address'];		echo "</td>";
					echo "<td>";	echo $rows['number'];		echo "</td>";
					// echo "<td>";	echo $rows['username'];		echo "</td>";
					echo "<th>";	echo $approve; echo $disapprove;echo "</th>";

			echo "</tr>";
	include "approve.php";
		}

		echo "</table>";
			}
		
	?>


</body>
</html>
