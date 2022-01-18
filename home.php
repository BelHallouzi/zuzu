<?php
$conn = mysqli_connect("localhost", "root", "", "zuzu");

if (!$conn) {
    die("Connectie gefaald" . mysqli_connect_error());
}
?>
<body>
<form action="home.php" method="POST">
    Voornaam:
    <input name="first_name" type="text"><br><br>
    Achternaam:
    <input name="last_name" type="text"><br><br>
    Adres:
    <input name="address" type="text"><br><br>
    Postcode:
    <input name="zipcode" type="text"><br><br>
    Woonplaats:
    <input name="residence" type="text"><br><br>
    <input name="submit" type="submit">
</form>
<?php
if (isset($_POST['submit'])) {
    session_start();
    echo "Session is gestart<br><br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $residence = $_POST['residence'];
    if (empty($firstName && $lastName && $address && $zipcode && $residence)) {
        echo "Vul alle velden in";
    } else {
        echo "$firstName<br>";
        echo "$lastName<br>";
        echo "$address<br>";
        echo "$zipcode<br>";
        echo "$residence<br>";
    }

    $name = $_REQUEST['first_name'];
    $lastName = $_REQUEST['last_name'];
    $address = $_REQUEST['address'];
    $zipcode = $_REQUEST['zipcode'];
    $residence = $_REQUEST['residence'];

    $sql = "INSERT INTO klant(first_name, last_name, address, zipcode, residence) 
    VALUES('".$_POST["first_name"]." ', ' ".$_POST["last_name"]." ', ' ".$_POST["address"]." ', ' ".$_POST["zipcode"]." ', ' ".$_POST["residence"]."')";
        if ($conn->query($sql) === TRUE) {
            echo "Uw gegevens zijn ingevoerd" . "<br><br><br>";
            include_once "bestelling.php";
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
    $conn->close();
}
?>
</body>