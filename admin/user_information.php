
<?php
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

body {
  font-family: courier;
  transition: background-color .5s;
}
@media print
{    
    .navbar-form
    {
        display: none;
    }
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

	</style>
</head>
<body>
	<!--______________________________________________Search bar_______________________________________________________-->

<form class="navbar-form" method="post" name="form1">
<div class="input-group">
  <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" required="">
  <button type="submit" name="submit" class="btn btn-outline-primary">search</button>
  <button class="btn btn-primary" onclick="myFunction()"><i class="fa-solid fa-print"> print</i></button>
</div>
</form>
	<h1 style="text-align: center; font-family: courier; margin-top: 30px; ">List of patrons</h1>
	<?php

		if(isset($_POST['submit'])) {
			$q = mysqli_query($db, "SELECT * FROM `user` WHERE `first` like '%$_POST[search]%' OR `last`like '%$_POST[search]%' OR `address` like '%$_POST[search]%' OR `username`like '%$_POST[search]%' ");

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
					echo "<th>";		echo "FIRST NAME";	echo "</th>";
					echo "<th>";		echo "LAST NAME";		echo "</th>";
					echo "<th>";		echo "POSITION";		echo "</th>";
					echo "<th>";		echo "ADDRESS";			echo "</th>";
					echo "<th>";		echo "NUMBER";			echo "</th>";
					echo "<th>";		echo "USERNAME";		echo "</th>";

				echo "</tr>";

			while($rows = mysqli_fetch_assoc($q)) {
				echo "<tr>";
					echo "<td>";	echo $rows['first'];		echo "</td>";
					echo "<td>";	echo $rows['last'];			echo "</td>";
					echo "<td>";	echo $rows['position'];	echo "</td>";
					echo "<td>";	echo $rows['address'];	echo "</td>";
					echo "<td>";	echo $rows['num'];			echo "</td>";
					echo "<td>";	echo $rows['username'];	echo "</td>";
				echo "</tr>";
			}
			echo "</table>";		
				}
			}	

				/* If the button is not pressed. */
			else {
		$res = mysqli_query($db,"SELECT * FROM `user` ORDER BY `user`. `first` ASC;");
		//Table header
		echo "<table class = 'table table-bordered table-hover'>";
		echo "<tr style = 'background-color: #6db6b9e6;'>";
					echo "<th>";		echo "FIRST NAME";		echo "</th>";
					echo "<th>";		echo "LAST NAME";			echo "</th>";
					echo "<th>";		echo "POSITION";		echo "</th>";
					echo "<th>";		echo "ADDRESS";				echo "</th>";
					echo "<th>";		echo "NUMBER";				echo "</th>";
					echo "<th>";		echo "USERNAME";			echo "</th>";
		echo "</tr>";

		while($rows = mysqli_fetch_assoc($res)) {
			echo "<tr>";
					echo "<td>";	echo $rows['first'];			echo "</td>";
					echo "<td>";	echo $rows['last'];				echo "</td>";
					echo "<td>";	echo $rows['position'];	echo "</td>";
					echo "<td>";	echo $rows['address'];		echo "</td>";
					echo "<td>";	echo $rows['num'];				echo "</td>";
					echo "<td>";	echo $rows['username'];		echo "</td>";
			echo "</tr>";

		}

		echo "</table>";
			}
		
	?>
	<script type="text/javascript">
		function myFunction() {
    window.print();
}
	</script>
</body>
</html>

