<?php 
include "connection.php"; 
if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id'];
    $sql = "DELETE FROM `books` WHERE `bid`='$user_id'";
     $result = mysqli_query($db, $sql);
     if ($result == TRUE) {
      ?>
        <div class="alert alert-danger" role="alert" style="text-align: center; font-weight: bold; margin: 0;">
           Book deleted!
        </div>
      <?php
    }else{
        echo "Error:" . $sql . "<br>" . $db->error;
    }

} 

?>