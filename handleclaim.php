<?php

include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');
?>
<?php
if(isset($_SESSION['logged_in']) && (!empty($_SESSION['phone']))){ $phone = $_SESSION['phone']; ?>


<?php

if(isset($_POST['claim'])){
    $data = $_POST['claim'];
    $update_sql = "UPDATE users SET `name` = '{$data}' WHERE  phone  = {$data}";
    $update_res = $db->query($update_sql);
    $count = mysqli_num_rows($update_res);
    echo $count;

}
?>


<?php
}else{
    echo "<script>window.location='login.php'</script>";
}
include('parts/footer.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>