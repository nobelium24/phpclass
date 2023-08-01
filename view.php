<?php
    include "./config/connect.php";
    $id = $_GET['id'];
    echo $id;
    $query = "SELECT * FROM pizzas WHERE id = $id";
    $pizza = mysqli_query($connect, $query);
    $getDetails = mysqli_fetch_assoc($pizza);
    // print_r($getDetails);
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
    <div class="row">
        <div class="col-sm-8 card shadow-lg mx-auto py-5 px-5">
            <h6 class="display-6 text-muted text-center">PIZZA Details</h6>
            <h5>Pizza id: <?php echo $getDetails['id']; ?></h5>
            <h5>Customer email: <?php echo $getDetails['email']; ?></h5>
            <h5>Pizza name: <?php echo $getDetails['pizzaname']; ?></h5>
            <h5>Pizza ingredients: <?php echo $getDetails['pizzaingredients']; ?></h5>
            <h5>Pizza price: <?php echo $getDetails['pizzaprice']; ?></h5>
            <h5>Pizza created at: <?php echo $getDetails['created_at']; ?></h5>
            <div>
                <a href="pizzaApp.php" class="btn btn-dark">Back</a>
            </div>
        </div>

    </div>

</body>
</html>