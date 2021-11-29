<?php
include('parts/db.php');
include('parts/header.php');

?>
<style>
    
</style>
<div class="table-responsive ">
<table class="table " >
    <thead>
        <th class="text-info text-center">Name</th>
        <th class="text-info text-center">phone</th>
        <th class="text-info text-center">Referral </th>
        <th class="text-info text-center">Actions </th>
    </thead>
    <tbody >
    <?php
            $sqlx = "select * from users";
            $resx = $db->query($sqlx);
            if($resx){
                while($row = $resx->fetch_assoc()){

                $user_id = $row['id'];
                $username  = $row['name'];
                $userphone = $row['phone'];
                $userreferral = $row['referral'];
               echo "<tr>";
               echo "<td class='text-light'> $username </td>";
               echo "<td class='text-light'> $userphone </td>";
               echo "<td class='text-light'> $userreferral </td>";
               echo "<td class=''><div class='d-flex'> <a href='blockuser.php' class='btn btn-sm btn-danger'>Block</a>";
               echo "<a href='holduser.php' class='btn btn-sm btn-warning  ms-1'>Hold</a></div></td>";
               
               echo "</tr>";
                }
            }else{
                
            }
        
    ?>
  
        </tbody>
</table>
      
    
</div>

<?php

include('parts/footer.php');
?>