<?php
    include "./config/connect.php";
    $id = $_GET['id'];
    echo $id;
    $query = "DELETE FROM pizzas WHERE id = $id";
    if(mysqli_query($connect, $query)){
        header("Location: pizzaApp.php");
    }else{
        print_r("My sqli error:" . mysqli_error($connect));
    }
?>