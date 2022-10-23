
<?php
  include "connection.php";
  if(isset($_POST['submit'])) {
    if(isset($_SESSION['login_user']))
    {
      $peso = "<i class='fa-solid fa-peso-sign'></i>";
      // $not_available = '<p style="background-color: red;">Not-available</p>';
      $available="<p style='background-color: #67B35F;'>Available</p>";
      $bookname = $_POST['BookNumber'];
      $class = $_POST['Class'];
      $author = $_POST['Author'];
      $booktitle = $_POST['BookTitle'];
      $edition = $_POST['Edition'];
      $volume = $_POST['Volume'];
      $pages = $_POST['Pages'];
      $sourceoffunds = $_POST['SourceOfFunds'];
      $price = $_POST['Price'];
      $publisher = $_POST['Publisher'];
      $year = $_POST['Year'];
      mysqli_query($db, "INSERT INTO `books` (`bid`,`bnumber`,`class`,`author`,`booktitle`,`edition`,`vol`,`pages`,`source`,`price`,`publisher`,`year`,`status`) VALUES ('1', '$bookname','$class','$author','$booktitle','$edition','$volume','$pages','$sourceoffunds','$price','$publisher','$year', '$available');");
      ?>
        <script type="text/javascript">
          alert("Book Added Successfully.");
          // window.location = "books.php";
        </script>

      <?php
    }
    else{
      ?>
        <script type="text/javascript">
          alert("You Need To Login First");
        </script>
      <?php
    }
  }
?>
