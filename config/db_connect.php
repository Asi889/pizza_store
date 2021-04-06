<?php 

//conect to database
$conn = mysqli_connect('localhost', 'asi', 'asi1234', 'asi_pizza');

//check connection
if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}

?> 