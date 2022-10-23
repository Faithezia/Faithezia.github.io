<?php 
if(isset($_GET['ids'])) {
    $book = (int)$_GET['ids'];
    $bid = $rows['id'];
    $accepted='<p style="background-color: #67B35F;">Approved</p>';
    $date=date("F d, Y");
    $seven_days_gap = time() + 7*60*60*24;
    $return_date = date('F d, Y',$seven_days_gap);
    //Checking if the Book id is equal to book id table
    $charge = mysqli_query($db, "SELECT * FROM user");
    $charge_fetch = mysqli_fetch_assoc($charge);
    $peso = '<i class="fa-solid fa-peso-sign"></i>';
    if($book == $bid){
    mysqli_query($db, "INSERT INTO `borrowed_info` VALUES(DEFAULT,'$rows[username]','$rows[booktitle]','$accepted' ,'$date','$return_date','');");
    mysqli_query($db, "DELETE FROM `request` WHERE `id`='$book'");
      //Insert into charge database
    mysqli_query($db, "INSERT INTO `charges` VALUES(DEFAULT,'$rows[first]','$rows[last]','$rows[username]','$rows[position]','$charge_fetch[address]','$rows[booktitle]','$date','$return_date','$peso 0','progress');");
      ?>
        <script type="text/javascript">
          window.location = "request.php";
        </script>
        <div class="alert alert-success" role="alert" style="text-align: center; font-weight: bold; margin: 0;">
           Request approved!
        </div>
      <?php
}
}

?>