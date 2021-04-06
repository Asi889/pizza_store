<?php
include('./config/db_connect.php');
//conect to database
// $conn = mysqli_connect('localhost', 'asi', 'asi1234', 'asi_pizza');

// //check connection
// if (!$conn) {
//     echo 'Connection error:' . mysqli_connect_error();
// }

// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas';

//make query & get results
$result = mysqli_query($conn, $sql);

// fethcing the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

//close connection 
mysqli_close($conn);

//explode(',', $pizzas[0]['ingredients']);

// print_r($pizzas);
// echo $pizzas;

?>

<html>

<?php include('./templates/header.php'); ?>

<h4 class="center grey-text">Pizzas</h4>
<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="https://i.pinimg.com/originals/9c/ae/6b/9cae6bbb7614ced287b64b0fcced2bdf.png" alt="" class="pizza">
                    <div class="card-content center">
                        <h6> <?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing){ ?>
                                <li><?php echo htmlspecialchars($ing);  ?></li>
                                <?php }?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php include('./templates/footer.php'); ?>

</html>