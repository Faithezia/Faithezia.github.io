<?php 
  include "navbar.php";
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style type="text/css">
body{
  font-family: courier;
  margin: 0;
  background-image: url("images/authe_bg.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
@font-face{
  font-family: ArchivoBlack-Regular;
  src: url(bootstrap/fonts/ArchivoBlack-Regular.ttf);
}
.container{
  display: flex;
  font-family: ArchivoBlack-Regular;
  align-items: center;
  height: 80%;
  width: 40%;
  flex-direction: column;
  background-color: transparent;
  margin-top: 5%;
  padding: 5% 0% 3% 0%;
  border-radius: 20px;
  box-shadow: 0 19px 38px rgba(0,0,0,1), 0 15px 12px rgba(0,0,0,1);
  color: white;

}
@media only screen and (max-width: 900px){
  .container{
    display: flex;
    width: auto;
  }
}
.form-row{
  width: 80%;
}
.form-control{
  color: white;
  background-color: #3e4950;
  border-style: none;
}

#space{
  letter-spacing: 1.5px;
}

  </style>
</head>
<body>
<form class="needs-validation" novalidate action="" method="post">
<div class="container">
  <div class="form-row">
  <h1 style="letter-spacing: 10px; text-align: center; opacity: 1.0; ">LOGIN FORM</h1>
    <div class="col-md-12 mb-3" id="space">
      <label for="validationCustomUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend" style="height: 100%;"><i class="fa-solid fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" name="username" aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
          Enter your Password
         </div>
      </div>
    </div>

     <div class="col-md-12 mb-3" id="space">
      <label for="validationCustomPassword">Password</label>
     <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend" style="height: 100%;"><i class="fa-solid fa-lock"></i></span>
      </div>
      <input type="password" class="form-control" id="validationCustomPassword" placeholder="Password" name="password" required="">
     <div class="invalid-feedback">
          Enter your Password
     </div>
   </div>
  </div>

       <a href=""><button class="btn btn-primary" type="submit" name="submit" style="width: 100%; font-size: 1.5em; font-family: courier;">Login</button></a>
  </div>

<?php

        if(isset($_POST['submit'])) {
          $query = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]'");
          $row = mysqli_fetch_row($query);
          $username_input = $_POST['username'];
          if($row == TRUE){
          $verify_query = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]'");
          $verify_row = mysqli_fetch_assoc($verify_query);
          $password_input = $_POST['password'];
            if(password_verify($password_input, $verify_row['password'])){
              $_SESSION['login_user'] = $_POST['username'];
              ?>
                <script type="text/javascript">
                  window.location = "index.php"
                </script>
              <?php
            }
            else{
            ?>
            <div class="alert alert-danger" role="alert" style="text-align: center; font-weight: bold; position: static; margin: 3% 0 0 0; font-size: .8em;">
           Wrong password! Please try again.<?php echo "(Attempt ".$_SESSION['attempt'].")"; ?>
            </div>
            <?php
          }
          }
          
        else {
          /*-----------------------if username and password matches----------------*/
          if(!isset($_SESSION['attempt'])){
              $_SESSION['attempt']=0;
            }
            $_SESSION['attempt']++;
            ?>
            <div class="alert alert-danger" role="alert" style="text-align: center; font-weight: bold; position: static; margin: 3% 0 0 0; font-size: .8em;">
           Wrong username! Please try again.<?php echo "(Attempt ".$_SESSION['attempt'].")"; ?>
            </div>
            <?php
            if($_SESSION['attempt']>=3){
              $_SESSION['attempt']= 0;
              ?>
              <script type="text/javascript">
                window.location = "register.php"
              </script>
              <?php
            }
        }
        }
      ?>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</div>
</form>

</body>
</html>