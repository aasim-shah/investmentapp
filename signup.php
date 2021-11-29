<?php
include('parts/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

</head>

<body>
    <?php
include('parts/header.php');
include('parts/navbar.php');

?>

    <div class="container">
        <div class="form_container col-11 col-md-9 mx-auto mt-4">
            <h3 class="text-warning text-center">Sign UP Form</h3>
            <form action="handlesignup.php" method="post">
                <input type="text" name="name" id="" placeholder="Name" class="form-control mt-3 py-2 formInput" required>
                <input type="email" name="email" id="" placeholder="Email" class="form-control mt-3 py-2 formInput" >
                <input type="text" name="phone" id="" placeholder="Phone Number"
                    class="form-control mt-3 py-2 formInput" required>
                <input type="text" name="accountNo" id="" placeholder="Account Number"
                    class="form-control mt-3 py-2 formInput" required>
                <input type="text" name="address" id="" placeholder="Address" class="form-control mt-3 py-2 formInput">
                <input type="password" name="password" id="" placeholder="Password" class="form-control mt-3 py-2 formInput" required>
                <input type="password" name="cpassword" id="" placeholder="Confirm Password" class="form-control mt-3 py-2 formInput" required>
               <div class="text-center"><button type="submit" name="submit" class="btn btn-sm btn-warning w-50 mt-4 ">SignUp</button></div> 
            </form>
            <hr>
            <div class="text-center text-warning">OR</div>
            <hr>
            <div class="text-white text-center">Already have an account ?<a href="login.php"
                    class="btn btn-sm btn-primary w-50">Login</a></div>

        </div>
    </div>



    <?php
include('parts/footer.php');
?>

</body>

</html>