<?php

?>
<table id="cihaz">
    <tr >
        <th>Cihaz</th>
        <th>Marka</th>

    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM cihaz INNER JOIN marka on cihaz.markaid=marka.id", PDO::FETCH_ASSOC);
    foreach ($liste as $row) {

        echo "<tr>";
        echo "<td>" . $row["cihazadi"] . "</td>";
        echo "<td>" . $row["markaadi"] . "</td>";
        echo "<tr>";
    }
    ?>
</table>