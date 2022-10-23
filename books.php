<?php
	include "connection.php";
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
	table-layout: auto;
	}

	</style>
</head>
<body>
<!--______________________________________________Search bar_______________________________________________________-->

<form class="navbar-form" method="post" name="form1">
<div class="input-group">
  <input type="search" class="form-control rounded" name="search" placeholder="Search for books...." aria-label="Search" aria-describedby="search-addon" required="">
  <button type="submit" name="submit" class="btn btn-outline-primary">search</button>
</div>
</form>	

	<h1 style="text-align: center; font-family: courier;">List of books</h1>
	<?php
	$id = 0;
	// SEARCH FOR BOOKS
		if(isset($_POST['submit'])) {

			$q = mysqli_query($db, "SELECT * FROM `books` WHERE `bnumber` like '%$_POST[search]%' OR `booktitle`like '%$_POST[search]%' OR `author` like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0) {
				?>
				<div class="alert alert-dark" role="alert" style="margin: 0; text-align: center; font-weight: bold;">
  			Sorry! No book found. Try to search again.
				</div>
				<?php
			}
			else {
			echo "<table class = 'table table-bordered table-hover'>";
				echo "<tr style = 'background-color: #6db6b9e6;'>";
					echo "<th>";		echo "Book Number";				echo "</th>";
					echo "<th>";		echo "Class";							echo "</th>";
					echo "<th>";		echo "Author";						echo "</th>";
					echo "<th>";		echo "Book Title";				echo "</th>";
					echo "<th>";		echo "Edition";						echo "</th>";
					echo "<th>";		echo "Vol.";							echo "</th>";
					echo "<th>";		echo "Pages";							echo "</th>";
					echo "<th>";		echo "Price";							echo "</th>";
					echo "<th>";		echo "Publisher";					echo "</th>";
					echo "<th>";		echo "Status";						echo "</th>";
					echo "<th>";		echo "Borrow";						echo "</th>";
				echo "</tr>";

			while($rows = mysqli_fetch_assoc($q)) {
				$borrow = "<a href='books.php?id=$rows[bid];'><button type='submit' name='approve_button' class='btn btn-success btn-lg'><i class='fa-solid fa-check'></button></i></a>";
				echo "<tr>";
					echo "<td>";	echo $rows['bnumber'];		echo "</td>";
					echo "<td>";	echo $rows['class'];			echo "</td>";
					echo "<td>";	echo $rows['author'];			echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['edition'];		echo "</td>";
					echo "<td>";	echo $rows['vol'];				echo "</td>";
					echo "<td>";	echo $rows['pages'];			echo "</td>";
					echo "<td>";	echo $rows['price'];			echo "</td>";
					echo "<td>";	echo $rows['publisher'];	echo "</td>";
					echo "<td>";	echo $rows['status'];			echo "</td>";
					echo "<td>";	echo $borrow;							echo "</td>";
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
					echo "<th>";		echo "Book Number";			echo "</th>";
					echo "<th>";		echo "Class";					echo "</th>";
					echo "<th>";		echo "Author";					echo "</th>";
					echo "<th>";		echo "Book Title";			echo "</th>";
					echo "<th>";		echo "Edition";				echo "</th>";
					echo "<th>";		echo "Vol.";					echo "</th>";
					echo "<th>";		echo "Pages";					echo "</th>";
					echo "<th>";		echo "Price";					echo "</th>";
					echo "<th>";		echo "Publisher";				echo "</th>";
					echo "<th>";		echo "Status";					echo "</th>";
					echo "<th>";		echo "Borrow";					echo "</th>";
		echo "</tr>";

		while($rows = mysqli_fetch_assoc($res)) {
			$borrow = "<a href='books.php?id=$rows[bid];'><button type='submit' name='approve_button' class='btn btn-success btn-lg'><i class='fa-solid fa-check'></button></i></a>";
			echo "<tr>";
					echo "<td>";	echo $rows['bnumber'];		echo "</td>";
					echo "<td>";	echo $rows['class'];			echo "</td>";
					echo "<td>";	echo $rows['author'];		echo "</td>";
					echo "<td>";	echo $rows['booktitle'];	echo "</td>";
					echo "<td>";	echo $rows['edition'];		echo "</td>";
					echo "<td>";	echo $rows['vol'];			echo "</td>";
					echo "<td>";	echo $rows['pages'];			echo "</td>";
					echo "<td>";	echo $rows['price'];			echo "</td>";
					echo "<td>";	echo $rows['publisher'];	echo "</td>";
					echo "<td>";	echo $rows['status'];		echo "</td>";
					echo "<td>";	echo $borrow;					echo "</td>";
			echo "</tr>";
if (isset($_GET['id'])) {
    $book = (int)$_GET['id'];
    $bid = (int)$rows['bid'];
    //fetching datas from another table
    $user_fetch = mysqli_query($db, "SELECT * FROM user WHERE username='$_SESSION[login_user]'");
    $user_rows = mysqli_fetch_assoc($user_fetch);
    $verification = 0;
		$sql_verification = mysqli_query($db, "SELECT * FROM `request`");
		$not_vaiable = '<p style="background-color: #D70000;">Not-available</p>';
		if($rows['status'] == $not_vaiable){
			?>
        <div class="alert alert-danger" id="not-available" role="alert" style="text-align: center; font-weight: bold; margin: 0;">
           This book is not available for now!
        </div>
      <?php
		}
		else{
		while($row = mysqli_fetch_assoc($sql_verification )) {
        if($rows['bid'] == $row['id'] AND $row['username'] == $_SESSION['login_user']) {
          $verification = $verification + 1;
        }
      }
    //Checking if the Book id is equal to book id table
    if($book == $bid){
    	if($verification == 0){
     $sql = mysqli_query($db, "INSERT INTO `request` VALUES('$rows[bid]','$rows[booktitle]','$rows[author]' ,'$user_rows[first]' ,'$user_rows[last]','$user_rows[position]','$user_rows[address]','$user_rows[num]','$_SESSION[login_user]')");
      ?>
      	<style type="text/css">
					#not-available{
						display: none;
					}
				</style>
        <div class="alert alert-success" role="alert" style="text-align: center; font-weight: bold; margin: 0;">
           Your request is on the proccess. Please wait for approval!
        </div>
      <?php
			}
			else{
				?>
				<style type="text/css">
					#not-available{
						display: none;
					}
				</style>
        <div class="alert alert-danger" role="alert" style="text-align: center; font-weight: bold; margin: 0;">
           You can only request for this book once!
        </div>
      	<?php
			}
		}
		}
}
		}
		echo "</table>";
			}

	?>
</div>
</body>
</html>

