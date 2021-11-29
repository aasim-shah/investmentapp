<?php
session_start();
include('parts/db.php');
?>
<link rel="stylesheet" href="css/adminstyle.css">

<?php
include('parts/header.php');
?>







<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <div class="container-fluid">
        <div class="ms-4">
            <a class="navbar-brand  ms-5 " href="adminpanel.php">EASY MONEY</a>
        </div>
    </div><hr>
</nav>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    ?>
    <?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $old_pass = $_POST['old_password'];
    $new_pass = $_POST['new_password'];
    $new_pass_hash = password_hash($new_pass , PASSWORD_DEFAULT);
    $sql = "select * from admin where email = '{$email}'";
    $res = $db->query($sql);
    if($res){
       $row = $res->fetch_assoc();
       $user_id = $row['id'];
       $user_pass = $row['password'];
      if(password_verify($old_pass , $user_pass)){
          $update_sql = "UPDATE `admin` SET `password` = '{$new_pass_hash}' , `phone` = '{$phone}'  WHERE `admin`.`id` = '{$user_id}'";
          $update_res = $db->query($update_sql);
          if($update_res){
              echo "password Updated";
          }else{
              echo "you can not change your password right now ";
          }
      }else{
          echo "old password is wrong";
      }
    }else{
        echo 'haha';
    }
}
?>


<div class="container">
    <form action="" method="POST">

        <input type="text" name="email" id="" class="form-control mt-2" value="<?php echo $email; ?>" placeholder="Email" >
        <input type="text" name="phone" id="" class="form-control mt-2" placeholder="Phone" value="<?php echo $phone; ?>" >
        <input type="text" name="old_password" id=""  class="form-control mt-2" placeholder="old_password">
        <input type="text" name="new_password" id=""  class="form-control mt-2" placeholder="new_password">
        <button type="submit" name="submit" class="btn btn-sm btn-success mt-2 py-1 px-4">Update</button>
    </form>
</div>
    

<?php }else{
 header('location:adminlogin.php');
}?>
<?php
include('parts/footer.php');
?>
    </body>

    </html>