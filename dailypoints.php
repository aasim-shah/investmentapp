<?php

include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');
?>
<style>
    body{
        background-color:white !important;
    }
</style>
<?php
if(isset($_SESSION['logged_in']) && (!empty($_SESSION['phone']))){ $phone = $_SESSION['phone']; ?>

<?php

$sql = "select * from users where phone = '{$phone}'";
$res = $db->query($sql);
$num  = mysqli_num_rows($res);
if($num > 0){
    $row = $res->fetch_assoc();
    $id = $row['id'];
    $name = $row['name'];
    $sqll = "select   SUM(plan_daily_points) AS sum  from plan_requests where user_id = {$id} && plan_status = 'approved'";
    $ress = $db->query($sqll);if($ress){$row = $ress->fetch_assoc(); $sum = $row['sum']; echo 'daily points ='.$sum;}
    $sql1 = "select * from plan_requests where user_id = {$id}";
    $res1 = $db->query($sql1);
    $num1  = mysqli_num_rows($res1);
    $d=0;
    if($num1 > 0){
        while($row1 = $res1->fetch_assoc()){

            $plan_status = $row1['plan_status'];
            $plan_id = $row1['plan_id'];
            $req_id = $row1['id'];
            if($plan_status == 'approved'){
                echo 'reqid'. $req_id;
                $sqlx = "UPDATE `plan_requests` SET `user_paid` = '3423asd4' WHERE `plan_requests`.`id` = {$req_id}";
                $resx =$db->query($sqlx);
                if($resx){
                    echo 'ahhaah';
                }else{
                    echo 'nanan';
                }
                
                echo "---";
            }else{

            }
          
        }
    }
    

}
?>


<?php
}else{
    echo "<script>window.location='login.php'</script>";
}
include('parts/footer.php');
?>
