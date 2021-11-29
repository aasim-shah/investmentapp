<?php
include('parts/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>
<body>
<?php
include('parts/header.php');
include('parts/navbar.php');

?>

<div class="container">
    <div class="form_container col-11 col-md-9 mx-auto">
        <h3 class="text-warning text-center">Login Form</h3>
        <form action="handlelogin.php" method="post">
            
            <input type="text" name="phone" id="" placeholder="Phone Number" class="form-control mt-3 py-2 formInput" required>
            <input type="password" name="password" id="" placeholder="Password" class="form-control mt-3 py-2 formInput" required>
         
          <div class="text-center"> <button type="submit" name="submit" class="btn btn-sm btn-warning w-50 mt-4 ">Login</button></div> 
         </form>
         <hr>
            <div class="text-center text-warning">OR</div>
            <hr>
            <div class="text-white text-center">Create an account ?<a href="signup.php"
                    class="btn btn-sm btn-primary w-50">Sign Up</a></div>
                
    </div>
</div>



<?php
include('parts/footer.php');
?>
    
</body>
</html>