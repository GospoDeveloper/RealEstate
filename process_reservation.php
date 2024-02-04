<!-- <?php
// Get form data
if(isset($_POST["submit"])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];

// Validate form data
if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time)) {
    echo "Please fill out all required fields.";
    exit;
}

// Connect to database
$host = "localhost"; // replace with your host name
$dbname = "proiectimobiliare"; // replace with your database name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO reservations (name, email, phone, date, time) VALUES (:name, :email, :phone, :date, :time)");

} catch (PDOException $e) {
    echo "Error connecting to database: " . $e->getMessage();
    exit;
}

//Insert reservation data into database
$stmt = $pdo->prepare("INSERT INTO reservations (name, email, phone, date, time) VALUES (:name, :email, :phone, :date, :time)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':time', $time);

if ($stmt->execute()) {
    echo "Thank you for your reservation!";
} else {
    echo "Sorry, there was an error submitting your reservation. Please try again later.";
}
}
?> -->

<?php
// verificare conexiune prin apasare buton submit
if(isset($_POST["submit"])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputSignup($name, $email, $phone, $date, $time) !== false){
        header("location:index.html?error=emptyinput");
        exit();
    }

    createReservation($conn, $name, $email, $phone,$date,$time);
}
else{
    header("location:index.html");
}

?>