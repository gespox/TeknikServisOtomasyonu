<?php

?>
<table id="ekip">
    <tr >
        <th>Ad</th>
        <th>Soyad</th>
        <th>Kullanici Adi</th>

    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM yetkili ", PDO::FETCH_ASSOC);
    foreach ($liste as $row) {

        echo "<tr>";
        echo "<td>" . $row["ad"] . "</td>";
        echo "<td>" . $row["soyad"] . "</td>";
        echo "<td>" . $row["kadi"] . "</td>";
        echo "<tr>";
    }
    ?>
</table>