<?php
$servername = "localhost";
$username = "vmadmin";
$password = "sml12345";
$database = "northwind";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<table>
    <tr>
        <th>ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Bestellungen</th>
    </tr>
    <?php

    $sql = "SELECT * FROM customers";
    foreach ($conn->query($sql) as $row) {
    ?>
        <tr>
            <td><?= $row["id"]; ?></td>
            <td><?= $row["first_name"]; ?></td>
            <td><?= $row["last_name"]; ?></td>
            <td><a href="bestellungen.php?id=<?=$row["id"];?>">Link</td>
        </tr>
    <?php
    }
    ?>
</table>