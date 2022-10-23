<?php 
include "connection.php"; 

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
     $result = mysqli_query($db, "INSERT INTO request VALUES('','$_SESSION[login_user]','$_POST[search]' ,'' ,'','','');");;
     if ($result == TRUE) {
      ?>
        <div class="alert alert-success" role="alert" style="text-align: center; font-weight: bold;">
           Record deleted successfully!
        </div>
      <?php
    }else{
        echo "Error:" . $sql . "<br>" . $db->error;
    }

} 

?>