<?php
require "Class/Prijs.php";
$db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
global $db;
$query = $db->prepare("SELECT * FROM sushi");
$query->execute();
$result = $query->fetchAll (PDO::FETCH_CLASS, 'Prijs');
foreach ($result as $sushi) {
    echo $sushi->name . "<br><br>" . " Prijs: " . $sushi->price . "<br> Hoeveelheden: " . $sushi->amount . "<br><br>";
}
?>
<body>
    <form action="bestelling.php" method="POST">
        Wat wilt u bestellen?
        <select name="sushi-order" type="text" placeholder="Sushi soort">
            <option value="nigiri">Nigiri</option>
            <option value="sashimi">Sashimi</option>
            <option value="maki">Maki</option>
        </select>
        <br><br>
        Hoeveel wilt u bestellen?
        <input name="order" type="number" placeholder="Hoeveelheid">
        <input name="send" type="submit">
    </form>
    <?php
    if (isset($_Get['submit'])) {
    echo "Welkom " . $_GET['first_name'];
    $orderSushi = $_GET['order'];
    }
    ?>
</body>