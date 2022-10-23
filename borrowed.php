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

.input-group {
  display: flex;
  width: 50%;
  margin: 5% 0% 0% 25%;
}

.table{
  table-layout: auto;
  }

  </style>
</head>
<body>
  <h1 style="text-align: center; font-family: courier; margin-top: 50px;">List of borrowed books</h1>
   <?php
    $c=0;

      if(isset($_SESSION['login_user']))
      {
        $sql= mysqli_query($db, "SELECT books.bnumber, books.author, books.booktitle, books.edition, books.vol, books.publisher, books.price, borrowed_info.b_date, borrowed_info.r_date FROM `user` inner join `borrowed_info` ON user.username=borrowed_info.username inner join `books` ON borrowed_info.booktitle=books.booktitle WHERE borrowed_info.username='$_SESSION[login_user]' ORDER BY borrowed_info.b_date ASC");

      echo "<table class = 'table table-bordered table-hover'>";
        echo "<tr style = 'background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Book Number";    echo "</th>";
        echo "<th>"; echo "Book Title";     echo "</th>";
        echo "<th>"; echo "Book Author";    echo "</th>";
        echo "<th>"; echo "Edition";        echo "</th>";
        echo "<th>"; echo "Vol.";           echo "</th>";
        echo "<th>"; echo "Publisher";      echo "</th>";
        echo "<th>"; echo "Price";          echo "</th>";
        echo "<th>"; echo "Issue Date";     echo "</th>";
        echo "<th>"; echo "Return Date";    echo "</th>";
      echo "</tr>"; 
      while($row=mysqli_fetch_assoc($sql))
      {
        echo "<tr>";
          echo "<td>"; echo $row['bnumber'];    echo "</td>";
          echo "<td>"; echo $row['author'];     echo "</td>";
          echo "<td>"; echo $row['booktitle'];  echo "</td>";
          echo "<td>"; echo $row['edition'];    echo "</td>";
          echo "<td>"; echo $row['vol'];        echo "</td>";
          echo "<td>"; echo $row['publisher'];  echo "</td>";
          echo "<td>"; echo $row['price'];      echo "</td>";
          echo "<td>"; echo $row['b_date'];     echo "</td>";
          echo "<td>"; echo $row['r_date'];     echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
      }

    ?>
</div>
</body>
</html>

