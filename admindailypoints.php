<?php
session_start();
include('parts/db.php');
include('parts/header.php');

?>
<style>
    
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <div class="container-fluid">
        <div class="ms-4">
            <button id="sidebarbtn"> <i class="fas fa-bars  text-light fa-2x" id="icon"></i></button>
            <a class="navbar-brand ms-5 " href="adminpanel.php">ESY MONEY</a>
        </div>
    </div><hr>
</nav>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>

<div class="contianer mt-5  col-10 col-md-6 col-sm-5 mx-auto">
    <form action="handleadmindailypoints.php" method="post">

        <label for="select" class="text-start mt-3 text-warning">Select Plan :</label>
        <select name="plan_id" id="select" class="form-control">
            <option value="1" class="form-control" >silver Plan</option>
            <option value="2"  class="form-control">Gold Plan</option>
            <option value="3" class="form-control" >Plantinum Plan</option>
        </select>
        <label for="daily_points" class="text-start mt-3 text-warning">Today's Points : </label>
        <input type="text" name="daily_points" id="daily_points" class="form-control">
        <button type="submit" name="submit" class="btn btn-sm btn-warning w-50 mt-3 ms-5">Done</button>
    </form>
</div>

<?php
}else{
    echo 'logedout';
    echo "<script>window.location='adminlogin.php'</script>";
}
include('parts/footer.php');
?>