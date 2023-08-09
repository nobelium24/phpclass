<?php
require("./config/connect.php");
session_start(); //This is used to start our session


$email = $pizzaIngredients = $pizzaName = $pizzaPrice = "";


$errors = ['email' => '', 'pizzaName' => '', 'pizzaPrice' => '', 'pizzaIngredients' => '']; //Associative array that stores the errors


//Check if the form has been submitted
if (isset($_POST)) {
    //Check if the inputs are empty
    if (empty($_POST['name'])) {
        $errors['pizzaName'] = "Pizza name is required";
    } else {
        //Check if the name is valid
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
            $errors['pizzaName'] = "Name must be alphabets only";
        }
    }

    //Check if the ingredients are empty
    if (empty($_POST['ingredients'])) {
        $errors['pizzaName'] = "Pizza ingredients are required";
    } else {
        //Check if the ingredients are valid
        if (!preg_match('/^([a-zA-Z\s]+)(,[a-zA-Z\s]*)*$/', $_POST['ingredients'])) {
            $errors['pizzaIngredients'] = "Ingredients are not valid";
        }
    }

    //Check if the price is empty
    if (empty($_POST['price'])) {
        $errors['pizzaName'] = "Pizza price is required";
    } else {
        //Check if the price is valid
        if (!preg_match('/[0-9\s]+$/', $_POST['price'])) {
            $errors['pizzaPrice'] = "Price is invalid";
        }
    }

    //Check if the email is empty
    if (empty($_POST['email'])) {
        $errors['email'] = "email is required";
    } else {
        //Check if the email is valid
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "email is invalid";
        }
    }

    //Check if there are errors in the inputs (if the errors array is not empty)
    if (array_filter($errors)) {
        echo "Errors in inputs";
    } else {
        //Save to Database

        //Get the inputs from the form via the POST superglobal and assign them to variables
        $pizzaName = $_POST['name'];
        $pizzaIngredients = $_POST['ingredients'];
        $pizzaPrice = $_POST['price'];
        $email = $_POST['email'];

        //To save data to the server session storage, we assign what we want to save to an arbitrary key created for the $_SESSION superGlobal
        $_SESSION["email"]  = $email;
        $_SESSION["price"] = $pizzaPrice;

        print_r($_SESSION);

        unset($_SESSION['price']); //Used to get rid of a single value in oue session
        print_r($_SESSION);

        session_unset(); //Used to clear session
        print_r($_SESSION);

        //Create sql query to insert into DB
        $sql = "INSERT INTO pizzas(pizzaname, pizzaingredients, pizzaprice, email) VALUES('$pizzaName', '$pizzaIngredients', '$pizzaPrice', '$email')";

        //Save to DB and check if it was successful
        if (mysqli_query($connect, $sql)) {
            echo ("Pizza added successfully");
        } else {
            echo ("Error: " . mysqli_error($connect));
        }
    }
}

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

    <div>
    <h6 class="display-6 text-muted">Pizza Orders</h6>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Pizza Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Create sql query to get all the pizzas from the DB
            $sql = "SELECT * FROM pizzas";
            $pizzas = mysqli_query($connect, $sql);
            $pizzas = mysqli_fetch_all($pizzas, MYSQLI_ASSOC); //Converts the result gotten from the DB to an associative array
            
            //Loop through the pizzas array and display the pizzas
            foreach ($pizzas as $pizza) {
                print_r("<tr>
                        <td>" . $pizza['id'] . "</td>
                        <td>" . $pizza['email'] . "</td>
                        <td>" . $pizza['pizzaname'] . "</td>
                        <td class='d-flex'>
                            <div class='me-1'>
                            <a href='view.php?id=" . $pizza['id'] . "' class='btn btn-sm btn-outline-dark'>View</a>
                            <a href='edit.php?id=" . $pizza['id'] . "' class='btn btn-sm btn-outline-dark'>Edit</a>
                            <a href='delete.php?id=" . $pizza['id'] . "' class='btn btn-sm btn-outline-danger'>Delete</a>
                            </div>
                        </td>
                    </tr>");
            }
            // Note that the delete button is a form because we want to send the id of the pizza to the delete.php file and it is a post request. The edit button is not a form because we don't need to send any data to the edit.php file and it is a get request. 
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>