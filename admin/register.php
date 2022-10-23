<?php 
  include "navbar.php";
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <style type="text/css">
body{
  font-family: courier;
  margin: 0;
  background-image: url("images/background.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
@font-face{
  font-family: ArchivoBlack;
  src: url(bootstrap/fonts/ArchivoBlack-Regular.ttf);
}
.container{
  display: flex;
  font-family: courier;
  align-items: center;
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
.form-row{
  width: 70%;
}
#space{
  letter-spacing: 1.5px;
}
#inputGroupPrepend{
   height: 100%;
}

  </style>
</head>
<body>

<form class="needs-validation" novalidate action="" method="post">
  <div class="container">
  <div class="form-row">
    <h1 style="letter-spacing: 9px;">REGISTRATION FORM</h1>
    <div class="col-md-12 mb-3" id="space">
      <label for="validationCustom01">First name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-signature"></i></span>
        </div>
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="first" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Please enter your first name.
        </div>
    </div>
  </div>

    <div class="col-md-12 mb-3">
      <label for="validationCustom02" id="space">Last name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-signature"></i></span>
        </div>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Please enter your last name.
      </div>
      </div>
    </div>

    <div class="col-md-12 mb-3">
      <label for="validationCustom03" id="space">Cell. Number</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone-alt"></i></span>
        </div>
      <input type="number" class="form-control" id="validationCustom03" placeholder="Cell. Number" name="num" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Please enter your No.
      </div>
    </div>
  </div>

    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername" id="space">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa-sharp fa-solid fa-user-tie"></i></i></span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" name="username" aria-describedby="inputGroupPrepend" required>
        <div class="valid-feedback">
        Looks good!
        </div>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>

     <div class="col-md-12 mb-3">
      <label for="validationCustomPassword" id="space">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock"></i></span>
        </div>
      <input type="password" class="form-control" id="validationCustomPassword" placeholder="Password" name="password" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Please choose a password.
        </div>
    </div>
  </div>
      <a href=""><button class="btn btn-primary" type="submit" name="submit" style="width: 100%; font-size: 1.5em; font-family: courier">Register</button></a>
</div>
</div>
</form>

  <?php
    if(isset($_POST['submit'])) {
      $count = 0;
      $sql = "SELECT username FROM `admin`";
      $res = mysqli_query($db,$sql);

      while($row = mysqli_fetch_assoc($res)) {
        if($row['username'] == $_POST['username']) {
          $count = $count + 1;
        }
      }

    if($count == 0) {
    $password_input = $_POST['password'];
    $password_hash = password_hash($password_input, PASSWORD_DEFAULT);
    mysqli_query($db,"INSERT INTO `admin` VALUES(DEFAULT, '$_POST[first]', '$_POST[last]', '$_POST[username]', '$password_hash', '$_POST[num]');");
  ?>
    <script type="text/javascript">
      alert("Registration succesful");
      window.location = "login.php"
    </script>
  <?php
  }

    else {
  ?>
    <script type="text/javascript">
      alert("The username already exist");
    </script>
  <?php
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
</body>
</html>