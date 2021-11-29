<?php
include('parts/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('parts/header.php');
    ?>
    <title>Investment App</title>
</head>

<body>
    <?php
    include('parts/navbar.php');
?>
    <div class="main_container">
        <div class="container">
            <h4 class="text-light">The Most Trustable Plateform for investment</h4>
            <h6 class="text-light mt-2">We provides the most secure and trustable portal for investors with best Planes
                .</h6>
            <a href="signup.php" class=" mt-2 btn btn-sm btn-info py-2 w-50">Join Now </a>
        </div>
    </div>
    <div class="sec_main_container row mx-0">
        <div class="analytics_container col-10 mx-auto col-md-3 my-4 py-3">
            <div class="icon text-center my-3 ">
                <i class=" fa fa-users fa-3x text-light"></i>
            </div>
            <div class="icon_text text-light">
                <span class="icon_number">4232</span>
            </div>
            <div class="sub_text">
                <span class="icon_text">Total Users</span>
            </div>
        </div>
        <div class="analytics_container col-10 mx-auto col-md-3 my-4 py-3">
            <div class="icon text-center my-3 ">
                <i class="fas fa-hand-holding-usd fa-3x text-light"></i>
            </div>
            <div class="icon_text text-light">
                <span class="icon_number">3242</span>
            </div>
            <div class="sub_text">
                <span class="icon_text">Total Deposit</span>
            </div>
        </div>
        <div class="analytics_container col-10 mx-auto col-md-3 my-4 py-3">
            <div class="icon text-center my-3 ">
                <i class="fas fa-chart-bar fa-3x text-light"></i>
            </div>
            <div class="icon_text text-light">
                <span class="icon_number">4234234</span>
            </div>
            <div class="sub_text">
                <span class="icon_text">Total Withdrawal</span>
            </div>
        </div> 
    </div>
    <div class="third_main_container row mx-0">
        <?php
        $sql = "select * from plans";
        $result = $db->query($sql);
        if($result){
            while($row = $result->fetch_assoc()){
                $pId = $row['id'];
                $pBanner = $row['banner_text'];
                $pName = $row['pName'];
                $pAmount = $row['pAmount'];
                $pEarning = $row['pEarning'];
                $pTotalReturn = $row['pTotalReturn'];
                $pReferralComission = $row['pReferralComission'];
                $pMinWithdraw = $row['pMinWithdraw'];
                $pValidTime = $row['pValidTime'];
                ?>
        <div class="plans_container col-10 col-md-3 mx-auto py-3">
            <div class="badgee"><span class="badgee_inner"><?php echo $pBanner; ?></span></div>
            <div class="pName"><?php echo $pName; ?></div>
            <div class="pAmount text-warning">RS : <?php echo $pAmount; ?> <small class="pDays"><?php echo $pValidTime; ?></small></div>
            <h4 class="mt-2 text-warning">Plan Details</h4>
            <div class="pText">Daily Earnings : <?php echo $pEarning; ?> Pkr</div>
            <div class="pText">Total Returns : <?php echo $pTotalReturn; ?> Pkr</div>
            <div class="pText">Referral Comission : <?php echo $pReferralComission; ?></div>
            <div class="pText">Minimun Withdrawal : <?php echo $pMinWithdraw; ?> Pkr</div>
            <div class="pText">Valid For : <?php echo $pValidTime; ?></div>
            <form action="confirmplan.php" method="post">
                <input type="hidden" name="pId" id="" value="<?php echo $pId; ?>">
                <input type="hidden" name="pName" id="" value="<?php echo $pName; ?>">
                <input type="hidden" name="pEarning" id="" value="<?php echo $pEarning; ?>">
                <input type="hidden" name="pAmount" id="" value="<?php echo $pAmount; ?>">
                <button type="submit" name="submit" class="btn btn-sm btn-dark py-2 w-50 mt-3 text-warning">Get Plan</button>
            </form>

        </div>
        <?php
            }
        }
        ?>
    </div>
    <?php

include('parts/footer.php');
?>
</body>

</html>