<?php
$db = new mysqli('localhost' , 'root' , '' , 'specscam_investment');
if($db->connect_error){
    echo "db connection failed";
    die();
}
?>