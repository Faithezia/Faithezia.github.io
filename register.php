<?php 
  include "navbar.php";
    if(isset($_POST['submit'])) {
      $count = 0;
      $sql = "SELECT username FROM `user`";
      $res = mysqli_query($db,$sql);

      while($row = mysqli_fetch_assoc($res)) {
        if($row['username'] == $_POST['username']) {
          $count = $count + 1;
        }
      }

    if($count == 0) {
    $password_input = $_POST['password'];
    $password_hash = password_hash($password_input, PASSWORD_DEFAULT);
    mysqli_query($db,"INSERT INTO `user` VALUES(DEFAULT, '$_POST[first]', '$_POST[last]','$_POST[position]','$_POST[address]','$_POST[num]', '$_POST[username]', '$password_hash');");
  ?>
    <script type="text/javascript">
      alert("Registration succesful");
      window.location = "login.php"
    </script>
  <?php
  }

    else {
  ?>
    <div class="alert alert-danger" role="alert" style="text-align: center; align-self: center; width: 60%; font-weight: bold; margin: 3% 0 0 20%; font-size:1em;">
          Username already exist
    </div>
  <?php
      }
  } 
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
@media only screen and (max-width: 800px){
  .container{
    display: flex;
    width: auto;
  }
}
.form-row{
  width: 70%;
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
    <h1 style="letter-spacing: 10px; font-size: 2.3em; margin-bottom: 5%;">REGISTRATION FORM</h1>
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

    <div class="select">
          <select name="position" required>
            <option value="" selected disabled >Position</option>
            <option value="Elementary">Elementary</option>
            <option value="High School">High School</option>
            <option value="College">College</option>
            <option value="Others">Others</option>
          </select>
      </div>

    <div class="col-md-12 mb-3">
        <label for="validationCustom03" id="space">Home Address</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-house"></i></span>
          </div>
        <input type="text" class="form-control" id="validationCustom03" placeholder="Address" name="address" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
            Please enter your Address
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
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-user"></i></span>
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