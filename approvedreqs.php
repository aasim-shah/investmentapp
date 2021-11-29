<?php
session_start();
include('parts/db.php');
?>
<link rel="stylesheet" href="css/adminstyle.css">

<?php
include('parts/header.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <div class="container-fluid">
        <div class="ms-4">
            <button id="sidebarbtn"> <i class="fas fa-bars  text-light fa-2x" id="icon"></i></button>
            <a class="navbar-brand ms-5 " href="adminpanel.php">ESY MONEY</a>
        </div>
    </div>
    <hr>
</nav>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>
<div class=" sidebar_container  col-8 col-sm-4 col-md-3" id="sidebar">
    <div class="container mt-3 admin_details my-3">
        <h4 class="text-white">
            <?php echo $_SESSION['admin_name']; ?>
        </h4>
        <h5 class="text-white">
            <?php echo $_SESSION['email']; ?>
        </h5>
    </div>
    <div class="">
        <ul class="ul ">
            <li class="li_item"><a href="pendingreqs.php"><i class="far fa-clock mx-2"></i></i> Pending </a></li>
            <li class="li_item"><a href="approvedreqs.php"><i class="fas fa-check mx-2"></i>Approved</a></li>
            <li class="li_item"><a href="rejectedreqs.php"><i class="fas fa-times mx-2"></i>Rejected</a></li>

        </ul>
    </div>
</div>

<div class=" bg-custom container-fluid mt-2">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-6 text-center">
            <h4 class="text-warning">Approved </h4>
            <div class="container text-start ">
                <?php
            $sql ="select * from plan_requests where plan_status = 'approved' order by id desc";
            $result = $db->query($sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                while($row = $result->fetch_assoc()){
                    $plan_req_id = $row['id'];
                    $username = $row['username'];
                    $accountNo = $row['account_number'];
                    $phone = $row['phone'];
                    $plan = $row['plan_id'];
                    $plan_status = $row['plan_status'];
                    $user_paid = $row['user_paid'];
                    $plan_img = $row['plan_paymentproof'];
              
            ?>
                <div class="reqcard  mt-4">
                    <table class="table">

                        <tr>
                            <td class="title">Name :</td>
                            <td class="text-warning">
                                <?php echo $username ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Account No :</td>
                            <td class="text-warning">
                                <?php echo $accountNo ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">User Paid :</td>
                            <td class="text-warning">
                                <?php echo $user_paid ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Phone No :</td>
                            <td class="text-warning">
                                <?php echo $phone ; ?>
                            </td>
                        </tr>


                        <?php 
  $sql1 ="select * from plans where id = {$plan}";
  $res = $db->query($sql1);
  if($res){
     $row = $res->fetch_assoc();
     $pName = $row['pName'];
     $pAmount = $row['pAmount'];
     echo '<tr>
     <td class="title">Plan Amount :</td>
     <td class="text-warning">'.$pAmount.'</td>
 </tr> ';
     echo '<tr>
     <td class="title">Plan Name :</td>
     <td class="text-warning">'.$pName.'</td>
 </tr>';
  }   
?>
                    </table>
                    <?php
                  
                  ?>
                    <div class="text-center my-2">
                        <img src="<?php echo $plan_img; ?>" alt="Payment Proof" class="" style="width:230px;">
                    </div>

                </div>
                <?php  } }    ?>
            </div>
        </div>
        <hr>
    </div>



    <?php
}else{
    header('location:adminlogin.php');
}

include('parts/footer.php');
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#sidebar').hide();
            $('#sidebarbtn').on('click', function () {
                let sidebar = $('#sidebar');
                let sidebarbtn = $('#sidebarbtn');
                sidebar.toggle();
            })


        });
    </script>
    </body>

    </html>