<?php
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<style type="text/css">
body {
  margin: 0;
  background-image: url("images/background.jpg");
  background-attachment: fixed;
  background-size: cover;
  font-family: courier;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.container{
  display: flex;
  align-items: center;
  height: 80%;
  width: 60%;
  flex-direction: column;
  background-color: #031A35;
  padding: 3% 0% 3% 0%;
  border-radius: 10px;
  box-shadow: 0 19px 38px rgba(0,0,0,1), 0 15px 12px rgba(0,0,0,1);
  color: white;
}

@media only screen and (max-width: 1000px){
  .container{
    display: flex;
    width: auto;
  }
}

.book {
  width: 60%;
  margin: 0px auto;
}

.form-control {
  background-color: #080707;
  color: white;
  height: 40px;
}
</style>
</head>
<body>
    <div class="container">
    <h2 style="letter-spacing: .5em; color: white;">ADD BOOK</h2>
    <form class="book" method="post">
        <input type="text" name="BookNumber" class="form-control" placeholder="Book number" required=""><br>
        <input type="text" name="Class" class="form-control" placeholder="Class" required=""><br>
        <input type="text" name="Author" class="form-control" placeholder="Author" required=""><br>
        <input type="text" name="BookTitle" class="form-control" placeholder="Book title" required=""><br>
        <input type="text" name="Edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="Volume" class="form-control" placeholder="Volume" required=""><br>
        <input type="number" name="Pages" class="form-control" placeholder="Pages" required=""><br>
        <input type="number" name="Price" class="form-control" placeholder="Price" required=""><br>
        <input type="text" name="Publisher" class="form-control" placeholder="Publisher" required=""><br>
        <input type="text" name="Year" class="form-control" placeholder="Year" required=""><br>
        <button type="submit" name="submit" class="btn btn-success">ADD BOOK</button>
    </form>
  </div>
<?php 
  if(isset($_POST['submit'])) {
    if(isset($_SESSION['login_user']))
    {

      // $not_available = '<p style="background-color: red;">Not-available</p>';
      $available = '<p style="background-color: #67B35F;">Available</p>';

      mysqli_query($db, "INSERT INTO `books` VALUES (DEFAULT, '$_POST[BookNumber]','$_POST[Class]','$_POST[Author]','$_POST[BookTitle]','$_POST[Edition]','$_POST[Volume]','$_POST[Pages]','$_POST[Price]','$_POST[Publisher]','$_POST[Year]','$available');");
      ?>
        <script type="text/javascript">
          alert("Book Added Successfully.");
          window.location = "books.php";
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
</body>
</html>