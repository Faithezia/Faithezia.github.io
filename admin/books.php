<?php
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	
	<style type="text/css">
body {
  font-family: courier;
  transition: background-color .5s;
}
@media print
{    
    .navbar-form, .none
    {
        display: none;
    }
}
.input-group {
	display: flex;
	width: 90%;
	margin: 6% 0% 0% 5%;
}

.table{
	font-weight: bold;
	table-layout: auto;
	}

.delete {
		background: none;
		border: none;
		margin-left: 25%;
		cursor: pointer;
    color: #E34724;
}
.delete:hover{
	color: red;
}	

.bottom_button{
	display: flex;
	flex-direction: column;
}
.table_buttons{
	margin: 5%;
}

.btn-success, .btn-danger{
	display: inline-block;
	margin: 0 0 5% 20%;
	font-size: 14px;
}	

	</style>
</head>
<body>
	<!--___________________________________________Search bar___________________________________________________-->

<form class="navbar-form" method="post" name="form1" >
<div class="input-group">
  <input type="search" class="form-control rounded" name="search" placeholder="Search for books..." aria-label="Search" aria-describedby="search-addon" required="">
  <button type="submit" name="srch" class="btn btn-outline-primary">search</button>
	<button class="btn btn-primary" name="" onclick="printBtn()"><i class="fa-solid fa-print"> print</i></button>
	<script type="text/javascript">
		function printBtn() {
    window.print();
}
	</script>
<!-- 
  <div class="bottom_button">
  <a href="add.php"><button type="button" class="btn btn-primary">Add Books</button></a>
  <button type="submit" name="submit1" class="btn btn-danger">Delete</button>
  </div> -->
</div>
</form>
	<h1 style="text-align: center; font-family: courier; margin-top: 30px;">List of books</h1>
	<?php
	include "delete_book.php";
	  $peso = '<i class="fa-solid fa-peso-sign"></i>';
		// IF SEARCH BUTTON PRESSED
		if(isset($_POST['srch'])) {
			$q = mysqli_query($db, "SELECT * FROM `books` WHERE `bnumber` like '%$_POST[search]%' OR `bid`like '%$_POST[search]%' OR `booktitle`like '%$_POST[search]%' OR `author` like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0) {
				?>
				<div class="alert alert-warning" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			Sorry! No book found. Try to search again.
				</div>
				<?php
			}
			else {
			echo "<table class = 'table table-bordered table-hover'>";
				echo "<tr style = 'background-color: #6db6b9e6;'>";
					// echo "<th>";		echo "BOOK ID";					echo "</th>";
					echo "<th>";		echo "BOOK NUMBER";			echo "</th>";
					echo "<th>";		echo "CLASS";						echo "</th>";
					echo "<th>";		echo "AUTHOR";					echo "</th>";
					echo "<th>";		echo "BOOK TITLE";			echo "</th>";
					echo "<th>";		echo "EDITION";					echo "</th>";
					echo "<th>";		echo "VOL.";						echo "</th>";
					echo "<th>";		echo "PRICE";						echo "</th>";
					echo "<th>";		echo "PUBLISHER";				echo "</th>";
					echo "<th>";		echo "STATUS";					echo "</th>";
echo "<th class='none'>";		echo "DEL/EDIT";				echo "</th>";
				echo "</tr>";

			while($rows = mysqli_fetch_assoc($q)) {
				$delete = "<a href='books.php?id=$rows[bid];'><button type='submit' name='approve_button' class='btn btn-danger btn-lg'><i class='fa-solid fa-trash'></i></button></a>";

			$edit = "<a href='edit.php?ids=$rows[bid];'><button type='submit' name='edit_button' class='btn btn-success btn-lg'><i class='fa-solid fa-pen-to-square'></i></button></a>";
				echo "<tr>";
					// echo "<td>";	echo $rows['bid'];				echo "</td>";
					echo "<td>";	echo $rows['bnumber'];		echo "</td>";
					echo "<td>";	echo $rows['class'];			echo "</td>";
					echo "<td>";	echo $rows['author'];			echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['edition'];		echo "</td>";
					echo "<td>";	echo $rows['vol'];				echo "</td>";
					echo "<td>";	echo $peso; echo $rows['price'];			echo "</td>";
					echo "<td>";	echo $rows['publisher'];	echo "</td>";
					echo "<td>";	echo $rows['status'];			echo "</td>";
echo "<td class='none'>";	echo $delete; echo$edit;	echo "</td>";
				echo "</tr>";

			}
			echo "</table>";		
				}
			}	
				/* If the button is not pressed. */
			else {
		$res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`bnumber` ASC;");
		//Table header
		echo "<table class = 'table table-bordered table-hover'>";
		echo "<tr style = 'background-color: #6db6b9e6;'>";
					// echo "<th>";		echo "BOOK ID";					echo "</th>";
					echo "<th>";		echo "BOOK NUMBER";			echo "</th>";
					echo "<th>";		echo "CLASS";						echo "</th>";
					echo "<th>";		echo "AUTHOR";					echo "</th>";
					echo "<th>";		echo "BOOK TITLE";			echo "</th>";
					echo "<th>";		echo "EDITION";					echo "</th>";
					echo "<th>";		echo "VOL.";						echo "</th>";
					echo "<th>";		echo "PRICE";						echo "</th>";
					echo "<th>";		echo "PUBLISHER";				echo "</th>";
					echo "<th>";		echo "STATUS";					echo "</th>";
echo "<th class='none'>";		echo "DEL/EDIT";				echo "</th>";
		echo "</tr>";

		while($rows = mysqli_fetch_assoc($res)) {

			$delete = "<a href='books.php?id=$rows[bid];'><button type='submit' name='approve_button' class='btn btn-danger btn-lg'><i class='fa-solid fa-trash'></i></button></a>";

			$edit = "<a href='edit.php?ids=$rows[bid];'><button type='submit' name='edit_button' class='btn btn-success btn-lg'><i class='fa-solid fa-pen-to-square'></i></button></a>";

			echo "<tr>";
					// echo "<td>";	echo $rows['bid'];				echo "</td>";
					echo "<td>";	echo $rows['bnumber'];		echo "</td>";
					echo "<td>";	echo $rows['class'];			echo "</td>";
					echo "<td>";	echo $rows['author'];			echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['edition'];		echo "</td>";
					echo "<td>";	echo $rows['vol'];				echo "</td>";
					echo "<td>";	echo $peso; echo $rows['price'];			echo "</td>";
					echo "<td>";	echo $rows['publisher'];	echo "</td>";
					echo "<td>";	echo $rows['status'];			echo "</td>";
					echo "<td class='none'>";	echo $delete; echo$edit;	echo "</td>";
			echo "</tr>";
		}

		echo "</table>";
			}
	?>

</body>
</html>

