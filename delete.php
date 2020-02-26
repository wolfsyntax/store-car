<?php 
    include_once 'database.php';
    
    $sql = "Delete From cars Where _id=".$_GET['id'];
    
    if($query = mysqli_query($db, $sql)){
        header( "Location: car_list.php" );
        exit;
    }
    
    
?>