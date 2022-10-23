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
  <input type="search" class="form-control rounded" name="search" placeholder="Search for records..." aria-label="Search" aria-describedby="search-addon" required="">
  <button type="submit" name="submit" class="btn btn-outline-primary">search</button>
</div>

 <?php


?> 

</form>

	<h1 style="text-align: center; margin-top: 30px; ">Borrowed books</h1>
	<?php
		$id = 0;
		if(isset($_POST['submit'])) {
			$q = mysqli_query($db, "SELECT * FROM `record` WHERE `first` like '%$_POST[search]%' OR `last` like '%$_POST[search]%' OR `position` like '%$_POST[search]%' OR `address` like '%$_POST[search]%' OR `booktitle`like '%$_POST[search]%' OR `b_date` like '%$_POST[search]%' OR `r_date`like '%$_POST[search]%'");
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
					echo "<th>";		echo "FIRST NAME";				echo "</th>";
				 	echo "<th>";		echo "LAST NAME";					echo "</th>";
				 	echo "<th>";		echo "POSITION";					echo "</th>";
					// echo "<th>";		echo "ADDRESS";						echo "</th>";
					echo "<th>";		echo "BOOK TITLE";				echo "</th>";
					echo "<th>";		echo "BORROWED DATE";			echo "</th>";
					echo "<th>";		echo "DUE DATE";					echo "</th>";
					echo "<th>";		echo "FINE";							echo "</th>";
					echo "<th>";		echo "STATUS";						echo "</th>";
				echo "</tr>";
			while($rows = mysqli_fetch_assoc($q)) {
				echo "<tr>";
					echo "<td>";	echo $rows['first'];			echo "</td>";
					echo "<td>";	echo $rows['last'];				echo "</td>";
					echo "<td>";	echo $rows['position'];		echo "</td>";
					// echo "<td>";	echo $rows['address'];		echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['b_date'];			echo "</td>";
					echo "<td>";	echo $rows['r_date'];			echo "</td>";
					echo "<td>";	echo $rows['fine'];				echo "</td>";
					echo "<td>";	echo $rows['status'];			echo "</td>";
				echo "</tr>";
			}
			echo "</table>";		
				}
			}	

				/* If the button is not pressed. */
			else {
		$res = mysqli_query($db,"SELECT * FROM `record` ORDER BY `record`.`r_date` ASC;");
		//Table header
		echo "<table class = 'table table-bordered table-hover'>";
		echo "<tr style = 'background-color: #6db6b9e6;'>";
					echo "<th>";		echo "FIRST NAME";				echo "</th>";
				 	echo "<th>";		echo "LAST NAME";					echo "</th>";
				 	echo "<th>";		echo "POSITION";					echo "</th>";
					// echo "<th>";		echo "ADDRESS";						echo "</th>";
					echo "<th>";		echo "BOOK TITLE";				echo "</th>";
					echo "<th>";		echo "BORROWED DATE";			echo "</th>";
					echo "<th>";		echo "DUE DATE";					echo "</th>";
					echo "<th>";		echo "FINE";							echo "</th>";
					echo "<th>";		echo "STATUS";						echo "</th>";
		echo "</tr>";

		while($rows = mysqli_fetch_assoc($res)) {
			$c = 0;
      $d=date("F d, Y");
        if($d>$rows['r_date']){
          $c=$c+1;
          $var='<p style="background-color: #D70000;">NOT-PAID</p>';
      mysqli_query($db, "UPDATE `charges` SET `status`='$var' WHERE `r_date`='$rows[r_date]' ");
    }
			echo "<tr>";
					echo "<td>";	echo $rows['first'];			echo "</td>";
					echo "<td>";	echo $rows['last'];				echo "</td>";
					echo "<td>";	echo $rows['position'];		echo "</td>";
					// echo "<td>";	echo $rows['address'];		echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['b_date'];			echo "</td>";
					echo "<td>";	echo $rows['r_date'];			echo "</td>";
					echo "<td>";	echo $rows['fine'];				echo "</td>";
					echo "<td>";	echo $rows['status'];			echo "</td>";
			echo "</tr>";
			if(isset($_GET['id'])) {
				$returned_text='<p style="background-color: #00A02A;">PAID</p>';
				$charge_id = (int)$_GET['id'];
				$id = $rows['id'];
				$peso = '<i class="fa-solid fa-peso-sign"></i>';
				if($charge_id == $id){
				mysqli_query($db, "INSERT INTO `record` VALUES(DEFAULT,'$rows[first]','$rows[last]','$rows[position]','$rows[booktitle]','$rows[b_date]','$rows[r_date]','$peso$rows[fine]','$returned_text')");
				mysqli_query($db, "DELETE FROM `charges` WHERE `id`='$id'");
				?>
        <div class="alert alert-success" role="alert" style="text-align: center; margin: 0; font-weight: bold;">
           Book returned successfully!
        </div>
      <?php
				}
			}

		}
		echo "</table>";
			}


	?>


</body>
</html>
