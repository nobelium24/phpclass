<?php
    $connect = mysqli_connect("localhost", "nobelium24", "oluwatobi", "pizzaclass");
    if(!$connect){
        print_r("Connection error: " .   mysqli_connect_error() );
    }else{
        echo("Connection successful");
    }
?>