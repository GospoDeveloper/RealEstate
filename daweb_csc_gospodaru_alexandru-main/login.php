<?php
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $parola = $_POST["parola"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputLogin($email, $parola) !== false){
        header("location:index.html?error=emptyinputLogin");
        exit();
    }

    loginUser($conn, $email, $parola);
}
else{
    header("location:index.html?error=login");
    exit();
}
?>