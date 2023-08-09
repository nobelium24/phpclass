<?php
    include "./config/connect.php";
    echo "Test ram";
    if (isset($_POST)) {
        $id = $_POST['id'];
        $pizzaname = $_POST['pizzaname'];
        $pizzaingredients = $_POST['pizzaingredients'];
        $pizzaprice = $_POST['pizzaprice']; 
        $email = $_POST['email'];

        setcookie("cookieEmail", $email, time()+86400); //Used to set data to cookie storage. First argument is the key holding what is set to cookies in our $_COOKIE superGlobal. Second argument is what is to be saved to cookie storage and the 3rd argument is the expiration time. 

        print_r($_COOKIE['cookieEmail']);
        //To delete a cookie, we simply backdate the expiration time in our setCookie method by at least a day


        $query = "UPDATE pizzas SET pizzaname = '$pizzaname', pizzaingredients = '$pizzaingredients', pizzaprice = '$pizzaprice', email = '$email' WHERE id = '$id'";

        if(mysqli_query($connect, $query)){
            header("Location: pizzaApp.php");
        }else{
            print_r("My sqli error:" . mysqli_error($connect));
        }
    }
?>