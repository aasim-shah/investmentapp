<?php

include('parts/db.php');
include('parts/header.php');
?>


<?php
if(isset($_POST['approve'])){
    $plan_id = $_POST['plan_req_id'];
    $plan_status = "approved";
   $sql1 = "UPDATE `plan_requests` SET `plan_status` = '{$plan_status}' WHERE `plan_requests`.`id` = {$plan_id} ";
   $res1 = $db->query($sql1);
   if($res1){
       echo "plan approved";
   }else{
       echo "error";
   }

}
?>

<?php
if(isset($_POST['reject'])){
    $plan_id = $_POST['plan_req_id'];
    $plan_status = "rejected";
    $sql1 = "UPDATE `plan_requests` SET `plan_status` = '{$plan_status}' WHERE `plan_requests`.`id` = {$plan_id} ";
   $res1 = $db->query($sql1);
   if($res1){
       echo "plan rejected";
   }else{
       echo "error";
   }
}
?>

<?php

include('parts/footer.php');
?>