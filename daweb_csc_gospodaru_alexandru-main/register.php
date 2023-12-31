<?php
// verificare conexiune prin apasare buton submit
if(isset($_POST["submit"])){
    
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputSignup($nume, $email, $parola) !== false){
        header("location:index.html?error=emptyinput");
        exit();
    }

    if(invalidUsername($nume) !== false){
        header("location:index.html?error=invalidUsername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location:index.html?error=invalidEmail");
        exit();
    }
    if(userNameExists($conn, $nume, $email)!==false){
        header("location:index.html?error=usernametaken");
         exit();
    }

    createUser($conn, $nume, $email, $parola);
}
else{
    header("location:index.html");
}

?>