<?php
session_start();
include('parts/db.php');
include('parts/header.php');

?>
<?php
if(isset($_SESSION['isAdmin']) && (!empty($_SESSION['email']))){
?>

<div class="contianer">
    <select name="plan_name" id="">
        <option value="1">silver Plan</option>
        <option value="2">Gold Plan</option>
        <option value="3">Plantinum Plan</option>
    </select>
    <label for="daily_points">Today's Points : </label>
    <input type="text" name="daily_points" id="daily_points">
</div>

<h4>32323</h4>

<?php
}else{
    echo "<script>window.location='adminlogin.php</script>";
}
include('parts/footer.php');
?>