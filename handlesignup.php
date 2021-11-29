<?php
include('parts/db.php');

?>

<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $accountNo = $_POST['accountNo'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $referral = ('reff_' . rand(9 , 99999 * 4 * 43).'_10%') ; 
    $hash = password_hash($password , PASSWORD_DEFAULT);
    if($password == $cpassword){
        $sql = "select * from users where phone = {$phone}";
        $res = $db->query($sql);
        $count = mysqli_num_rows($res);
        if($count > 0 ){
            echo "You already have registered try LOgin directly";

        }else{
            $sql2= "INSERT INTO `users` ( `name`, `email`, `password`, `phone`, `account_number`, `address` , `referral`) VALUES ( '$name', '$email', '$hash',  '$phone', '$accountNo', '$address' , '$referral')";
            $res2 = $db->query($sql2);
            if($res2){
                echo 'reg done';
            }else{
                echo "reg failed";
            }
        }
    }else{
        echo "password does not matched";
    }


}
?>
