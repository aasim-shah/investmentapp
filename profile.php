<?php

include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');
?>
<?php
if(isset($_SESSION['logged_in']) && (!empty($_SESSION['phone']))){ $phone = $_SESSION['phone']; ?>



<div class="container">
    <table class="table text-light">
        <?php
        $sql = "select * from users where phone = '{$phone}'";
        $res = $db->query($sql);
        $count =mysqli_num_rows($res);
      if($count > 0){
            $row =$res->fetch_assoc();
            $user_id = $row['id'];
            $_SESSION['user_id'] = $user_id;
            $name = $row['name'];
            $phone = $row['phone'];
            $referral = $row['referral'];
            
        
        ?>
        <tr>
            <td>Name : </td>
            <td><?php echo $name; ?> </td>
        </tr>
        <tr>
            <td>Phone : </td>
            <td><?php echo $phone; ?> </td>
        </tr>
        <tr>
            <td>Referral  : </td>
            <td><?php echo $referral; ?> </td>
        </tr>
        <?php 
            $id =$_SESSION['user_id'];
        $i = 1;
         $sql2 = "select * from plan_requests where user_id = {$id}";}
         $res2 = $db->query($sql2);
         $count2= mysqli_num_rows($res2);
       if($count2 > 0 ){
             while(
             $roww = $res2->fetch_assoc()){
             $plan_name = $roww['plan_name'];
             $plan_amount = $roww['plan_amount'];
             $user_paid = $roww['user_paid'];
             $plan_status = $roww['plan_status'];
             $dt = $roww['dt'];
        
             ?>
             <td class="text-warning"><?php echo  'Plan '.$i++ ;?></td>
        <tr>
            <td>Plan Name : </td>
            <td><?php echo $plan_name; ?> </td>
        </tr>
        <tr>
            <td> Plan  Amount : </td>
            <td><?php echo $plan_amount ?> </td>
        </tr>
        <tr>
            <td>Your Payment : </td>
            <td><?php echo $user_paid ?> </td>
            
        </tr>
        <tr>
            <td>Plan Status : </td>
            <td><?php echo $plan_status ?> </td>
            
        </tr>
        <tr>
            <td>Subscription Date : </td>
            <td><?php echo $dt; ?> </td>
            
        </tr>
        <?php
             } 
    }
    ?>
    
    </table>
</div>

<div class="container">
<details>
<summary class="text-warning" style="font-size:22px;">referred_members :</summary>
<table class="table">
    <thead>
        <th class="text-info text-center">Name</th>
        <th class="text-info text-center">phone</th>
        <th class="text-info text-center">Referral </th>
    </thead>

    <?php
    $sqll = "select * from users where phone = '{$phone}'";
    $ress = $db->query($sql);
    $countt =mysqli_num_rows($res);
    if($countt > 0){
        $row =$ress->fetch_assoc();
        $members= $row['referred_members'];
        $e = explode(',' , $members);
        foreach($e as $i =>$key) {
            $i >0;
            $sqlx = "select * from users where id = {$key}";
            $resx = $db->query($sqlx);
            if($resx){
                $row = $resx->fetch_assoc();
                $username  = $row['name'];
                $userphone = $row['phone'];
                $userreferral = $row['referral'];
               echo "<tr>";
               echo "<td class='text-light'> $username </td>";
               echo '<input type="hidden" value="'.$userphone.'" id="phone">';
               echo "<td class='text-light ' id=''> $userphone </td>";
               echo "<td class='text-light'> $userreferral </td>";
              
               echo "</tr>";

            }else{
                
            }
            
        }
    }
    ?>
  
  
</table>
      
    </details>
</div>





<?php
}else{
    echo "<script>window.location='login.php'</script>";
}
include('parts/footer.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    var poll = true;
    var getData = function() {
        if (poll) {
           $.ajax({
               url : "handleclaim.php",
               method : "POST",
               data : {claim : phone},
               success : function (data){
                   console.log(data);
               }
           })
        }
    };

    $(document).ready(function() {
        phone = $('#phone').val();
        console.log(phone);
        setInterval(getData, 3000);
    });
</script>