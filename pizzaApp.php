<?php
require("./config/connect.php");
$pizzaName = $_POST['name'];
$pizzaIngredients = $_POST['ingredients'];
$pizzaPrice = $_POST['price'];
$email = $_POST['email'];

$errors = ['email' => '', 'pizzaName' => '', 'pizzaPrice' => '', 'pizzaIngredients' => ''];
function Validate()
{
    global $pizzaName;
    global $pizzaIngredients;
    global $pizzaPrice;
    global $email;
    global $errors;

    if (empty($pizzaName)) {
        $errors['pizzaName'] = "Pizza name is required";
    } else {
        if (!preg_match('/^[a-zA-Z\s]+$/', $pizzaName)) {
            $errors['pizzaName'] = "Name must be alphabets only";
        } else {
            print_r($pizzaName);
        }
    }

    if (empty($pizzaIngredients)) {
        echo ("Pizza ingredients are required");
    } else {
        if (!preg_match('/^([a-zA-Z\s]+)(,[a-zA-Z\s]*)*$/', $pizzaIngredients)) {
            $errors['pizzaIngredients'] = "Ingredients are not valid";
        } else {
            print_r($pizzaIngredients);
        }
    }

    if (empty($pizzaPrice)) {
        echo ("Pizza price is required");
    } else {
        if (!preg_match('/[0-9\s]+$/', $pizzaPrice)) {
            $errors['pizzaPrice'] = "Price is invalid";
        } else {
            print_r($pizzaPrice);
        }
    }

    if (empty($email)) {
        $errors['email'] = "email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "email is invalid";
        } else {
            print_r($email);
        }
    }
}

validate();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <form action="pizzaApp.php" method="post" class="container mx-auto card shadow-lg p-5">
        <h6 class="text-center text-muted display-6">Pizza app</h6>
        <input name="name" type="text" placeholder="Pizza name" class="form-control my-3">
        <p class="text-danger"><?php echo $errors['pizzaName'] ?></p>
        <br>

        <input name="ingredients" type="text" placeholder="Pizza ingredients" class="form-control my-3">
        <p class="text-danger"><?php echo $errors['pizzaIngredients'] ?></p>
        <br>

        <input name="price" type="text" placeholder="Pizza price" class="form-control my-3">
        <p class="text-danger"><?php echo $errors['pizzaPrice'] ?></p>
        <br>

        <input name="email" type="text" placeholder="email" class="form-control my-3">
        <p class="text-danger"><?php echo $errors['email'] ?></p>
        <br>

        <div>
            <button class="btn btn-dark">Submit</button>
        </div>
    </form>
</body>
</html>