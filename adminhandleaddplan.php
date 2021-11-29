<?php
include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');

?>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>

<?php

if(isset($_POST['submit'])){
    $plan_banner = $_POST['banner_text'];
    $plan_name = $_POST['plan_name'];
    $plan_amount = $_POST['plan_amount'];
    $plan_earning = $_POST['daily_earning'];
    $plan_return = $_POST['total_returns'];
    $plan_referral = $_POST['referral'];
    $plan_min_withdraw = $_POST['min_withdraw'];
    $plan_validFor = $_POST['valid_for'];
    $sql = "INSERT INTO `plans` (`banner_text`, `pName`, `pAmount`, `pEarning`, `pTotalReturn`, `pReferralComission`, `pMinWithdraw`, `pValidTime`) VALUES ( '$plan_banner', '$plan_name', '$plan_amount', '$plan_earning', '$plan_return', '$plan_referral', '$plan_min_withdraw', '$plan_validFor')";
    $result = $db->query($sql);
    if($result){
        echo 'Plan added';
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