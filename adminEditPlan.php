<?php
session_start()
include('parts/db.php');
include('parts/header.php');

?>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <div class="container-fluid">
        <div class="ms-4">
            <button id="sidebarbtn"> <i class="fas fa-bars  text-light fa-2x" id="icon"></i></button>
            <a class="navbar-brand ms-5 " href="index.php">ESY MONEY</a>
        </div>
    </div><hr>
</nav>
<div class="mx-1">
<div class="container">
    <div class="form_container col-11 col-md-9 mx-auto">
    <?php
    $id = $_GET['p'];
    $sql = "select * from plans where id = {$id}";
    $res = $db->query($sql);
    $count = mysqli_num_rows($res);
    if($count > 0 ){
       $row = $res->fetch_assoc();
           $pId = $row['id'];
           $pName = $row['pName'];
           $pAmount = $row['pAmount'];
           $banner = $row['banner_text'];
           $pEarning = $row['pEarning'];
           $pTotal = $row['pTotalReturn'];
           $pReferral = $row['pReferralComission'];
           $minWithdraw = $row['pMinWithdraw'];
           $validFor = $row['pValidTime'];
        }
    ?>

        <h3 class="text-warning text-center">Update Plan</h3>
        <form action="adminhandleeditplan.php" method="post">  
            <input type="hidden" name="plan_id" value="<?php echo $pId; ?>" id="">
            <label for="banner_text" class="text-warning mt-2">Banner Text :</label>
            <input type="text" name="banner_text" id="banner_text" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $banner; ?>"> 
            
            <label for="plan_name" class="text-warning">Name :</label>
            <input type="text" name="plan_name" id="plan_name" placeholder="Plan Name" class="form-control formInput" value="<?php echo $pName; ?>">
            <label for="plan_amount" class="text-warning mt-2">Amount :</label>
            <input type="text" name="plan_amount" id="plan_amount" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $pAmount; ?>"> 


            <label for="daily_earning" class="text-warning mt-2">Daily Earning :</label>
            <input type="text" name="daily_earning" id="daily_earning" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $pEarning; ?>"> 
            

            <label for="total_returns" class="text-warning mt-2">Total Returns :</label>
            <input type="text" name="total_returns" id="total_returns" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $pTotal; ?>"> 
            

            <label for="referral" class="text-warning mt-2">Referral Comission :</label>
            <input type="text" name="referral" id="referral" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $pReferral; ?>"> 
            

            <label for="min_withdraw" class="text-warning mt-2">Min Withdrawl :</label>
            <input type="text" name="min_withdraw" id="min_withdraw" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $minWithdraw; ?>"> 
            

            <label for="valid_for" class="text-warning mt-2">Valid For :</label>
            <input type="text" name="valid_for" id="valid_for" placeholder="Plan Amount" class="form-control  formInput" value="<?php echo $validFor; ?>"> 
        
            
          <div class="text-center"> <button type="submit" name="update" class="btn btn-sm btn-warning w-50 mt-4 ">Update</button></div> 
         </form>
      

                   
    </div>
</div>

 
</div>


<?php
}else{
    header('location:adminlogin.php');
}
include('parts/footer.php');
?>