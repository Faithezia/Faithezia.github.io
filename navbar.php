<?php  
    session_start();
    include "connection.php";
    // if(isset($_SESSION['login_user']))
    //   {
    //     $day=0;
    //     $exp='<p style="background-color: #D70000;">NOT-PAID</p>';
    //     $res= mysqli_query($db,"SELECT * FROM `charges` WHERE  username='$_SESSION[login_user]' AND status='$exp'");
    //   while($row=mysqli_fetch_assoc($res))
    //   {
    //     $d= strtotime($row['r_date']);
    //     $c= strtotime(date("F d, Y"));
    //     $diff= $c-$d;
    //     $peso = '<i class="fa-solid fa-peso-sign"></i>';
    //     if($diff>=0)
    //     {
    //       $day= $day+floor($diff/(60*60*24)); 
    //       $charge=$day*10;
    //       $elementary_charge=$day*30;
    //       $highschool_charge=$day*40;
    //       $college_and_others=$day*50;
    //     } //Days
    //   }
    //      while($rows=mysqli_fetch_assoc($res)){
    //      if($rows['position'] == "Elementary"){
    //          mysqli_query($db, "UPDATE `charges` SET `fine`='$peso$elementary_charge' WHERE username='$_SESSION[login_user]'");
    //          $_SESSION['charge']=$elementary_charge;
    //         }
    //      if($rows['position'] == "High School"){
    //          mysqli_query($db, "UPDATE `charges` SET `fine`='$peso$highschool_charge' WHERE username='$_SESSION[login_user]'");
    //          $_SESSION['charge']=$highschool_charge;
    //         }
    //      if($rows['position'] == "College" OR $rows['position'] == "Others"){
    //          mysqli_query($db, "UPDATE `charges` SET `fine`='$peso$college_and_others' WHERE username='$_SESSION[login_user]'");
    //          $_SESSION['charge']=$college_and_others;
    //         }
    //         }
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LIBRARY SYSTEM</title>
<style>
    html {
     scroll-behavior: smooth;
    }
    body{
        padding-top: 70px;
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
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">LIBRARY SYSTEM |</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
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
                      <button class="btn btn-secondary dropdown-toggle <?= ($activePage == 'borrowed' OR $activePage == 'charge' OR $activePage =='record') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Circulation
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item <?= ($activePage == 'borrowed') ? 'active':''; ?>" href="borrowed.php"  style="font-size: 1.1em;">Request</a>
                        <a class="dropdown-item <?= ($activePage == 'charge') ? 'active':''; ?>" href="charge.php" style="font-size: 1.1em;">Charges</a>
                        <a class="dropdown-item <?= ($activePage == 'record') ? 'active':''; ?>" href="record.php" style="font-size: 1.1em;">Records</a>
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
                      <button class="btn btn-secondary dropdown-toggle <?= ($activePage == 'register' || $activePage == 'login') ? 'active':''; ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Athentication
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
