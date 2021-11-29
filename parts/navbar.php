<?php

session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
  <div class="container-fluid">
    <a class="navbar-brand ms-3" href="index.php">EASY MONEY</a>
    <button class="navbar-toggler" style="border:none;box-shadow:none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ">Payment Proofs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Pricing Plans</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">WhatsApp</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">signup</a>
        </li>
        <li class="nav-item">
          <div class="d-flex ">
            <?php
            
            if(isset($_SESSION['name'])){ ?>
            <a class="nav-link " href="logout.php"> Log out  <span class="text-warning"><?php   echo $_SESSION['name'];?></span></a>
            <li><a class="nav-link " href="profile.php"> Profile</a></li>

  
    <?php   }else{
              echo "<a class='nav-link' href='login.php'> Login </a>";
            }
            ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>