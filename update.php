<?php
    include "./config/connect.php";
    echo "Test ram";
    if (isset($_POST)) {
        $id = $_POST['id'];
        $pizzaname = $_POST['pizzaname'];
        $pizzaingredients = $_POST['pizzaingredients'];
        $pizzaprice = $_POST['pizzaprice'];
        $email = $_POST['email'];

        $query = "UPDATE pizzas SET pizzaname = '$pizzaname', pizzaingredients = '$pizzaingredients', pizzaprice = '$pizzaprice', email = '$email' WHERE id = '$id'";

        if(mysqli_query($connect, $query)){
            header("Location: pizzaApp.php");
        }else{
            print_r("My sqli error:" . mysqli_error($connect));
        }
    }
?>