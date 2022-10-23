<?php  
    session_start();
    date_default_timezone_set('Asia/Manila');
    include "connection.php";
    $active = 'Books';
          if(isset($_SESSION['login_user'])){
          $day=0;
          $charge = 0;
          $exp='<p style="background-color: #D70000;">NOT-PAID</p>';
          $res= mysqli_query($db,"SELECT * FROM `charges` WHERE status='$exp' ");
          while($row=mysqli_fetch_assoc($res))
          {
            $id=$row['id'];
            $d= strtotime($row['r_date']);
            $c= strtotime(date("F d, Y"));
            $diff= $c-$d;
            $peso = '<i class="fa-solid fa-peso-sign"></i>';
            $elementary = "Elementary";
            $highschool = "High School";
            $college = "College";
            $others = "Others";
            if($diff>=0)
            {
              $day = floor($diff/(60*60*24));
              if($row['position'] == $elementary){
              $charge=$day*30;
              }
              if($row['position'] == $highschool){
              $charge=$day*40;
              }
              if($row['position'] == $college){
              $charge=$day*50;
              }
            }
            mysqli_query($db,"UPDATE `charges` SET fine='$peso$charge' WHERE `id`='$id' AND position='$elementary'");
            mysqli_query($db,"UPDATE `charges` SET fine='$peso$charge' WHERE `id`='$id' AND position='$highschool'");
            mysqli_query($db,"UPDATE `charges` SET fine='$peso$charge' WHERE `id`='$id' AND position='$college'");
          }
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style>
    body{
        padding-top: 45px;
    }
    .navbar-brand:hover{
        transition: 0.5s;
        cursor: pointer;
        opacity: .50;
    }
    #navbarCollapse a{
      font-size: 25px;
    }
    .dropdown{
        margin: 0% 10px 0% 10px;
       
    }
    #navbarCollapse button.active{
    background-color: #0090E6;
    color: #FFFFFF;
    }
</style>
</head>
<body>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<div class="m-4">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="background-color: #6c757d">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">LIBRARY SYSTEM |</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                  <!--   <a href="index.php" class="nav-item nav-link">Home  |</a> -->
                    <?php
                    if(isset($_SESSION['login_user']))
                     {   
                    ?>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle <?= ($activePage == 'books') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cataloging
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item <?= ($activePage == 'books') ? 'active':''; ?>" href="books.php" style="font-size: 1.1em;">Books</a>
                      </div>
                    </div>

                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle <?= ($activePage == 'user_information') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User Management
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item <?= ($activePage == 'user_information') ? 'active':''; ?>" href="user_information.php" style="font-size: 1.1em;">User information</a>
                      </div>
                    </div>

                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle <?= ($activePage == 'request' OR $activePage == 'charge' OR $activePage == 'record') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Circulation
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item <?= ($activePage == 'request') ? 'active':''; ?>" href="request.php"  style="font-size: 1.1em;">Request</a>
                        <a class="dropdown-item <?= ($activePage == 'charge') ? 'active':''; ?>" href="charge.php" style="font-size: 1.1em;">Charges</a>
                        <a class="dropdown-item <?= ($activePage == 'record') ? 'active':''; ?>" href="record.php" style="font-size: 1.1em;">Records</a>
                      </div>
                    </div>

                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle <?= ($activePage == 'add') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acquisition
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item <?= ($activePage == 'add') ? 'active':''; ?>" href="add.php" style="font-size: 1.1em;">Book Acquisition</a>
                      </div>
                    </div>
                    
                </div>

                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                </div>
            
                <?php
                }

                else{
                ?>
                 <div class="dropdown">
                      <button name="auth" class="btn btn-secondary dropdown-toggle <?= ($activePage == 'register' || $activePage == 'login') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Authentication
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="register.php" class="dropdown-item <?= ($activePage == 'register') ? 'active':''; ?>" style="font-size: 1.1em;">Register</a>
                        <a href="login.php" class="dropdown-item <?= ($activePage == 'login') ? 'active':''; ?>" style="font-size: 1.1em;">Login</a>
                      </div>
                  </div>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/e4c09f0222.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
