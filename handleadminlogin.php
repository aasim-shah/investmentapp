<?php
session_start();
include('parts/db.php');

?>

<?php
$_SESSION['isAdmin'] = false;

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $sql = "SELECT * FROM `admin` WHERE `email` = '{$email}'";
    $res = $db->query($sql);
    if($res){
        $count = mysqli_num_rows($res);
        if($count > 0 ){
            $row = $res->fetch_assoc();
            $name = $row['name'];
            $uphone = $row['phone'];
            $upassword = $row['password'];
            if($phone == $uphone && password_verify($password , $upassword)){
                echo "you are loggid in";
                $_SESSION['isAdmin'] = true;
                $_SESSION['admin_name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                echo "<script>window.location='adminpanel.php'</script>";
            }else{
                echo "password not matched";
            }
        }else{
            echo "you are not registed user reg first ";
        }
    }else{
        echo "No user found";
    }
}

?>