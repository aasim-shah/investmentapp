<?php
session_start();
include('parts/db.php');

?>

<?php
$_SESSION['logged_in'] = false;

if(isset($_POST['submit'])){
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = "select * from users where phone = {$phone}";
    $res = $db->query($sql);
    $count = mysqli_num_rows($res);
    if($count > 0 ){
        $row = $res->fetch_assoc();
        $name = $row['name'];
        $upassword = $row['password'];
        if(password_verify($password, $upassword)){
            echo "you are loggid in";
            $_SESSION['logged_in'] = true;
            $_SESSION['phone'] = $phone;
            $_SESSION['name'] = $name;
            echo "<script>window.location='index.php'</script>";

        }else{
            echo "password not matched";
        }
    }else{
        echo "you are not registed user reg first ";
    }
}

?>