<?php
if((session_id() === null)) {
    session_start();
    echo session_id();
}
echo session_id();
include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');
?>
<?php
if(isset($_SESSION['logged_in']) && (!empty($_SESSION['phone']))){

    if(isset($_POST['submit'])){
        $pId = $_POST['pId'];
        $pName = $_POST['pName'];
        $pAmount = $_POST['pAmount'];
        $pEarning = $_POST['pEarning'];
        echo $pEarning;
        $_SESSION['pId'] = $pId ;
    }
    ?>

<div class="container">
    <?php
    $phone = $_SESSION['phone'];
    $user_sql = "select * from users where phone = {$phone}";
    $user_res = $db->query($user_sql);
    if($user_res){
        while($row = $user_res->fetch_assoc()){
            $userid = $row['id'];
            $username =   $row['name'];
            $email =   $row['email'];
            $phone =   $row['phone'];
            $accoutNo  = $row['account_number'];
        }
        
    }else{
        echo "redirect to login page";
    }
    ?>
    <form action="planadded.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="userid" id="username" value="<?php echo $userid; ?>" >
        <input type="hidden" name="pEarning" id="pEarning" value="<?php echo $pEarning; ?>" >
        <label for="username" class="text-warning mt-2">Name :</label>
        <input type="text" name="username" id="" value="<?php echo $username; ?>" class="form-control mt-2" readonly>
        <label for="phone" class="text-warning mt-2">Phone :</label>
        <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="form-control mt-2" readonly>
        <label for="account_no" class="text-warning mt-2">Account Number :</label>
        <input type="text" name="account_number" id="account_no" value="<?php echo $accoutNo; ?>" class="form-control mt-2" readonly>
        <label for="email" class="text-warning mt-2">Email :</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control mt-2" readonly>
        <label for="pName" class="text-warning mt-2">Plan Name :</label>
        <input type="text" name="plan_name" id="pName" value="<?php echo $pName; ?>" class="form-control mt-2"readonly >
        <input type="hidden" name="plan_id" id="" value="<?php echo $pId; ?>" class="form-control mt-2"readonly >
        <label for="pAmount" class="text-warning mt-2">Plan Amount :</label>
        <input type="text" name="plan_amount" id="pAmount" value="<?php echo $pAmount; ?>" class="form-control mt-2" readonly>
        <label for="reff" class="label mt-2 text-warning "> Referral code  :</label>
        <input type="text" name="reff" id="reff" value="" placeholder="Any Referral Code do you have ?" class="form-control mt-2" required>
        <label for="user_paid" class="text-warning mt-2">You Paid :</label>
        <input type="text" name="user_paid" id="user_paid" value="" placeholder="How much you Paid ?" class="form-control mt-2" required>
        <label for="paymentproof" class="label mt-2 text-warning "> Payment ScreenShot :</label>
        <input type="file" name="paymentproof" class="form-control mt-2" id="paymentproof" required>
        <button type="submit" class="btn btn-sm btn-info w-50  mt-3" name="confirm">Confirm</button>
    </form>
</div>


<?php
}else{
    header('location:login.php');
}
include('parts/footer.php');
?>
