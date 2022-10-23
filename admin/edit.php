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
select {
   -webkit-appearance:none;
   -moz-appearance:none;
   -ms-appearance:none;
   appearance:none;
   outline:0;
   box-shadow:none;
   border:0!important;
   background: black;
   background-image: none;
   flex: 1;
   padding: 0 .5em;
   color:#fff;
   cursor:pointer;
   font-size: 1em;
   font-family: courier, sans-serif;
}
select::-ms-expand {
   display: none;
}
.container{
  display: flex;
  align-items: center;
  height: 80%;
  width: 50%;
  flex-direction: column;
  background-color: #031A35;
  padding: 3% 0% 3% 0%;
  border-radius: 10px;
  box-shadow: 0 19px 38px rgba(0,0,0,1), 0 15px 12px rgba(0,0,0,1);
  color: white;
}
@media only screen and (max-width: 800px){
  .container{
    width: auto;
  }
}

.book {
  width: 70%;
  margin: 0px auto;
}

.form-control {
  background-color: #080707;
  color: white;
  height: 40px;
}
.select {
   position: relative;
   display: flex;
   height: 3em;
   line-height: 3;
   background: #5c6664;
   overflow: hidden;
   border-radius: .25em;
}
.select::after {
   content: '\25BC';
   position: absolute;
   top: 0;
   right: 0;
   padding: 0 1em;
   background: #2b2e2e;
   cursor:pointer;
   pointer-events:none;
   transition:.25s all ease;
}
.select:hover::after {
   color: #23b499;
}
</style>
</head>
<body>
<?php
  $sql = mysqli_query($db, "SELECT * FROM `books` WHERE bid='$_GET[ids]'");
  while($sql_fetch = mysqli_fetch_assoc($sql)){
?>
    <div class="container">
     
    <h2 style="letter-spacing: .5em; color: white;">EDIT BOOK</h2>
    <form class="book" method="post">

        Book Number
        <input type="text" name="BookNumber" class="form-control" placeholder="Book number" value="<?php echo $sql_fetch['bnumber']; ?>" required="">
        Class
        <input type="text" name="Class" class="form-control" placeholder="Class" value="<?php echo $sql_fetch['class']; ?>" required="">
        Book Author
        <input type="text" name="Author" class="form-control" placeholder="Author" value="<?php echo $sql_fetch['author']; ?>" required="">
        Book Title
        <input type="text" name="BookTitle" class="form-control" placeholder="Book title" value="<?php echo $sql_fetch['booktitle'] ?>" required="">
        Edition
        <input type="text" name="Edition" class="form-control" placeholder="Edition" value="<?php echo $sql_fetch['edition']; ?>" required="">
        Volume
        <input type="text" name="Volume" class="form-control" placeholder="Volume" value="<?php echo $sql_fetch['vol']; ?>" required="">
        Pages
        <input type="number" name="Pages" class="form-control" placeholder="Pages" value="<?php echo $sql_fetch['pages']; ?>" required="">
        Price
        <input type="number" name="Price" class="form-control" placeholder="Price" value="<?php echo $sql_fetch['price']; ?>" required="">
        Publisher
        <input type="text" name="Publisher" class="form-control" placeholder="Publisher" value="<?php echo $sql_fetch['publisher']; ?>" required="">
        Year
        <input type="text" name="Year" class="form-control" placeholder="Year" value="<?php echo $sql_fetch['year']; ?>" required=""><br>

        <div class="select">
          <select name="Status" required>
            <option value="" selected disabled style="color: grey;">Status</option>
            <option value='<p style="background-color: #67B35F;">Available</p>'>Available</option>
            <option value='<p style="background-color: #D70000;">Not-available</p>'>Not-available</option>
          </select>
        </div>

        <button type="submit" name="submit" class="btn btn-success" style="margin-top: 2%;">SUBMIT</button>
    </form>
  </div>

<?php
  }
  if(isset($_POST['submit'])) {
    if(isset($_SESSION['login_user']))
    {
      $book = (int)$_GET['ids'];
      $peso = '<i class="fa-solid fa-peso-sign"></i>';
      $available = '<p style="background-color: #67B35F;">Available</p>';
      mysqli_query($db, "UPDATE `books` SET bnumber='$_POST[BookNumber]', class='$_POST[BookNumber]', author='$_POST[Author]', booktitle='$_POST[BookTitle]', edition='$_POST[Edition]', vol='$_POST[Volume]', pages='$_POST[Pages]', price='$peso$_POST[Price]', publisher='$_POST[Publisher]', year='$_POST[Year]', status='$_POST[Status]' WHERE `bid`='$book'");
      ?>
        <script type="text/javascript">
          alert("Book updated!");
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