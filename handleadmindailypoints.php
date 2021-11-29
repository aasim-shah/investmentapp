<?php
session_start();
include('parts/db.php');
include('parts/header.php');

?>
<style>
    body{
        background-color:white;
    }
</style>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>
<?php
if(isset($_POST['submit'])){
    $plan_id = $_POST['plan_id'];
    $daily_points = $_POST['daily_points'];
    $sql = "select * from plan_requests where plan_id = {$plan_id}";
    $res = $db->query($sql);
    $plan_count = mysqli_num_rows($res);
    if($plan_count > 0){
        while($row = $res->fetch_assoc()){     
            $user_points = $row['plan_daily_points'];
           $status =$row['plan_status'];
           if($status == 'approved'){
               $new_points  = $user_points + $daily_points;
                $update_sql = "UPDATE `plan_requests` SET `plan_daily_points` = '{$new_points}' WHERE `plan_requests`.`plan_id` = {$plan_id} && `plan_requests`.`plan_status`  = 'approved'";
                $update_res = $db->query($update_sql);
                if($update_res ){
                    // $name =$row['plan_name'];
                    // echo "plan updated";
                    echo "<script>window.location='adminpanel.php'</script>";
                }else{
                    echo "update query faild ";
                }
            }
        }
    }else {
        echo "0 records found";
    }

}
?>


<?php
}else{
    echo 'logedout';
    echo "<script>window.location='adminlogin.php'</script>";
}
include('parts/footer.php');
?>