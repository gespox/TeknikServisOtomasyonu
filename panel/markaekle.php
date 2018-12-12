<div id="markaekle">
<table id="marka">
    <tr >
        <th>Markalar</th>

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
<style><?php include('panelcss/markaekle.css'); ?></style>


    <div id="form">
        <h3>Eklemek İsteğiniz Marka</h3>

        <form method="post">
            <label for="markaadi">Marka Adı</label>
            <input type="text" id="markaadi" name="markaadi" placeholder="Marka Adı..">
            <input type="submit" value="Submit" name="markaekle">
        </form>

        <?php
        if(isset($_POST["markaekle"])){
            $markaadi=$_POST["markaadi"];
        $sql = "INSERT INTO marka (markaadi)
        VALUES ($markaadi)  ";

        $conn->exec($sql);
        }
        ?>

    </div>

</div>