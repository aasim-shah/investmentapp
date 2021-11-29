<?php
session_start();
include('parts/db.php');
include('parts/header.php');


if(isset($_POST['confirm'])){
$phone = $_POST['phone'];
$pId = $_POST['plan_id'];
$userId = $_POST['userid'];
$name = $_POST['username'];
$accountNO = $_POST['account_number'];
$email = $_POST['email'];
$reff = $_POST['reff'];
$user_paid = $_POST['user_paid'];
$planName = $_POST['plan_name'];
$planAmount = $_POST['plan_amount'];
$planEarning = $_POST['pEarning'];
echo $planEarning;

    $ssname =  $_FILES["paymentproof"]["name"];
    $sstemp =  $_FILES["paymentproof"]["tmp_name"];
    $paymentproof = 'images/'.$ssname;
    move_uploaded_file($sstemp , $paymentproof);
    $sql = "INSERT INTO `plan_requests` (`user_id`, `username`, `email`, `phone`, `account_number`, `plan_id` ,`plan_name`, `plan_amount`,`plan_daily_points`, `plan_paymentproof`, `user_paid`,`dt`) VALUES ( '$userId', '$name', '$email', '$phone','$accountNO', '$pId', '$planName', '$planAmount', '$planEarning','$paymentproof', '$user_paid', current_timestamp())";
    $res = $db->query($sql);
    if($res){
        echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading"> Congratulations !</h4>
        <p>Your Subscription has been added to the pending list for admin we well shortly return to your request.</p>
        <hr>
        <p class="mb-0 text-center text-success">Thank you for your Trust .</p>
       <div class="text-center mt-4"> <a href="index.php" class="btn btn-sm btn-primary" > Browse More </a></div>
        </div>';
        $sql1 = "select * from users where referral = '{$reff}'";
        $res1 = $db->query($sql1);
        $count = mysqli_num_rows($res1);
        if($count > 0){
            $row = $res1->fetch_assoc();
            $user_id = $row['id'];
            $reff_err = 10 / 100 * $planAmount ;
            $referred_members = $row['referred_members'];
            $referred_earnings = $row['referred_earnings'];
            $total_reff_err = $referred_earnings + $reff_err ;
            $newd = explode(',' , $referred_members);
            $data = $referred_members . " , " . $userId  ;
            echo "reff matched ";
            $sql2 = "UPDATE `users` SET `referred_members` = '{$data}'  ,`referred_earnings` = '{$total_reff_err}' WHERE `users`.`id` = {$user_id} ";
            $res2 = $db->query($sql2);
            if($res2){
                echo "updated user";
            }else{
                echo "failed to update members list";
            }
                }else{
                    echo "reff not matched";
                }
    }else{
        echo '<div class="alert alert-warning" role="alert">
        <h4 class="alert-heading"> Ohh !</h4>
        <p>There is some Problem with the server we are getting back to you soon.</p>
        <hr>
        </div>';
    }
}

include('parts/footer.php');
?>

<!-- 
$user = "select * from users where phone = {$phone}";
    $userres = $db->query($user);
    if($userres){
        $row = $userres->fetch_assoc();
        $plan_1 = $row['plan1'];
        $plan_2 = $row['plan2'];         
        $sql ="UPDATE `users` SET ";
        if(empty($plan_1)){
            $sql.=  " `plan1` = '$p_id'";
            $sql.=  ", `plan1_paymentproof` = '$paymentproof'";
        }elseif(empty($plan_2)){
            $sql.=  " `plan2` = '$p_id'";
            $sql.=  ", `plan2_paymentproof` = '$paymentproof'";
        }else{
            $sql.=  " `plan3` = '$p_id'";
            $sql.=  ", `plan3_paymentproof` = '$paymentproof'";

        }
       
        $sql.=  " where phone = {$phone}";
        $res = $db->query($sql);
    } -->