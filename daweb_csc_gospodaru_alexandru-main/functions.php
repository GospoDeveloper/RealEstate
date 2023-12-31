<!-- functii de verificare formular register -->
<?php
function emptyInputSignup($nume, $email, $parola){
    $result;
    if(empty($nume) || empty($email) || empty($parola)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidUsername($nume){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $nume)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function userNameExists($conn, $nume, $email){
    $sql = "SELECT * FROM utilizatori WHERE nume = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:index.html?error=stmtfailedUserExists");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $nume, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createReservation($conn, $name, $email, $phone,$date,$time){
    $sql = "INSERT INTO reservations(name, email, phone, date, time) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:index.html?error=stmtfailedToCreateUser");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $date, $time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:confirmareRezervare.html");
    exit();

};

function createUser($conn, $nume, $email, $parola){
$sql = "INSERT INTO utilizatori(nume, email, parola)VALUES(?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:index.html?error=stmtfailedToCreateUser");
    exit();
}
$hashedPwd = password_hash($parola, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "sss", $nume, $email, $hashedPwd);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("Location:indexRegisterSucces.html?register=succes");
exit();
}

function emptyInputLogin($email, $parola){
    $result;
    if (empty($email) || empty($parola)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function loginUser($conn, $email, $parola){
    $emailExists = userNameExists($conn, $nume ,$email);
    if($emailExists === false){
        header("Location:index.html?login=NUexistaContul");
        exit();
    }
    $parolaHashed = $emailExists["parola"];
    $checkParola = password_verify($parola, $parolaHashed);
    if($checkParola === false){
        header("Location:index.html?login=NUexistaParola");
        exit();
    } else if ($checkParola === true){
        session_start();
        $_SESION["ID"] = $userNameExists["ID"];
        $_SESION["nume"] = $userNameExists["nume"];
        header("Location:indexlogat.html?login=logat");
        exit();
    }
}
?>