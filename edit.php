<?php
    include "./config/connect.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM pizzas WHERE id = $id";
    $pizza = mysqli_query($connect, $query);
    $getDetails = mysqli_fetch_assoc($pizza);
    print_r($getDetails);
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
        <form class="col-sm-8 card shadow-lg mx-auto py-5 px-5" action = "update.php" method="post">
            <h6 class="display-6 text-muted text-center">PIZZA Details</h6>
            <input type="hidden" name="id" class='form-control mb-3 border border-dark' value="<?php echo $getDetails['id']; ?> "/>
            <input type="hidden" name="email" class='form-control mb-3 border border-dark' value="<?php echo $getDetails['email']; ?>"/>
            <input name = "pizzaname" value = "<?php echo $getDetails['pizzaname']; ?>" class='form-control mb-3 border border-dark' />
            <input name = "pizzaingredients" value = "<?php echo $getDetails['pizzaingredients']; ?>" class='form-control mb-3 border border-dark'/>
            <input name = "pizzaprice" value='<?php echo $getDetails['pizzaprice']; ?>' class='form-control mb-3 border border-dark' />
            <div>
                <button class="btn btn-dark">Update</button>
            </div>
        </form>

    </div>

</body>
</html>