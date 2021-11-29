<?php
include('parts/db.php');
include('parts/header.php');
include('parts/navbar.php');

?>
<div class="mx-1">
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Payment</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select * from plans";
    $res = $db->query($sql);
    $count = mysqli_num_rows($res);
    if($count > 0 ){
       while($row = $res->fetch_assoc()){
           $pId = $row['id'];
           $pName = $row['pName'];
           $pAmount = $row['pAmount'];
           echo '<tr>
           <th scope="row">'.$pId.'</th>
           <td>'.$pName.'</td>
           <td>'.$pAmount.'</td>
           <td>
           <a href="adminEditPlan.php?p='.$pId.'"  class="btn py-0 px-1 btn-sm btn-warning">Edit</a>
           <a href="adminDeletePlan.php?p='.$pId.'"  class="btn py-0 px-1 btn-sm btn-danger">Delete</a>
           </td>
         </tr>';
       }

    }
    ?>
    
  </tbody>
</table>
</div>




<?php

}else{
    header('location:adminlogin.php');
}
include('parts/footer.php');
?>