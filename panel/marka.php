
<table id="marka">
    <tr >
        <th>Marka</th>

    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM marka ", PDO::FETCH_ASSOC);
    foreach ($liste as $row) {

        echo "<tr>";
        echo "<td>" . $row["markaadi"] . "</td>";
        echo "<tr>";
    }
    ?>
</table>
<style><?php include('panelcss/marka.css'); ?></style>