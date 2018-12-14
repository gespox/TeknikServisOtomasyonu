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
    <script>
        function asd() {

            return false;
        }
    </script>

    <div id="form"  >
        <h3>Eklemek İsteğiniz Marka</h3>

        <form method="post" onsubmit="return asd()">
            <label for="markaadi">Marka Adı</label>
            <input type="text" id="markaadi" name="markaadi" placeholder="Marka Adı.." required>
            <input type="submit" value="Ekle" name="markaekle">
        </form>

        <?php

        if(isset($_POST["markaekle"])){
            require_once "../baglan.php";
            $markaadi=$_POST["markaadi"];
            $sql = "INSERT INTO marka (markaadi) VALUES (:markaadi)";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':markaadi',$markaadi);
            $stmt->execute();
            if($stmt){
                $alert = "Marka Eklendi";
                echo "<script type='text/javascript'>alert('$alert');</script>";
            }
            else{
                $alert = "Hata Olustu";
                echo "<script type='text/javascript'>alert('$alert');</script>";
            }
        }
        ?>

    </div>

</div>