<?php
include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');

?>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>

<?php

if(isset($_POST['update'])){
    $plan_id = $_POST['plan_id'];
    $plan_banner = $_POST['banner_text'];
    $plan_name = $_POST['plan_name'];
    $plan_amount = $_POST['plan_amount'];
    $plan_earning = $_POST['daily_earning'];
    $plan_return = $_POST['total_returns'];
    $plan_referral = $_POST['referral'];
    $plan_min_withdraw = $_POST['min_withdraw'];
    $plan_validFor = $_POST['valid_for'];
    echo $plan_id;
    $sql = "UPDATE `plans` SET `banner_text` = '{$plan_banner}' , `pName` = '{$plan_name}' , `pAmount` = '{$plan_amount}' , `pEarning` = '{$plan_earning}'  , `pTotalReturn` = '{$plan_return}' , `pReferralComission` = '{$plan_referral}' , `pMinWithdraw` = '{$plan_min_withdraw}' , `pValidTime` = '{$plan_validFor}' WHERE `plans`.`id` = {$plan_id}";
    $result = $db->query($sql);
    if($result){
        echo 'update';
    }else{
        echo "an issue";
    }
}
?>


<?php
}else{
    header('location:adminlogin.php');
}
include('parts/footer.php');
?>