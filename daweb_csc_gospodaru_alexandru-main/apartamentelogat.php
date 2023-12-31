<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartamente</title>
</head>
<body>

    <?php
    $conn = new mysqli("localhost","root", "","proiectimobiliare");

    $result = $conn->query("SELECT * FROM proprietate");
    foreach($result as $value){
        $id = $value['ID'];
        $titlu = $value['titlu'];
        $descriere = $value ['descriere'];
        $suprafata = $value ['suprafata'];
        echo '<img
        src="https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
     style="width:300px; height:200px" />';
      echo "<h2>" . $titlu . "</h2>";
      echo "<h2>" . $descriere . "</h2>";
      echo "<h2>" . $suprafata . "</h2>"; 
    }  
    ?>
    <button class="rezerva">Rezerva</button>
    <script src="buton_rezerva.js"></script>
</body>
</html>