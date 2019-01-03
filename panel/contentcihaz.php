<div id="cihazekle">
<table id="cihaz">
    <tr >
        <th>Cihaz</th>
        <th>Marka</th>

    </tr>
    <?php
    require_once "../baglan.php";
    $liste = $conn->query(" SELECT * FROM cihaz INNER JOIN marka on cihaz.markaid=marka.idmarka", PDO::FETCH_ASSOC);
    foreach ($liste as $row) {

        echo "<tr>";
        echo "<td>" . $row["cihazadi"] . "</td>";
        echo "<td>" . $row["markaadi"] . "</td>";
        echo "<tr>";
    }
    ?>
</table>
<style><?php include('panelcss/cihaz.css'); ?></style>
<div id="formcihaz"  >
    <h3>Eklemek İsteğiniz cihaz</h3>

    <form method="post">
        <label for="markaadi">Marka Adı</label>
        <select name="markaid" required>
            <?php
            require_once "../baglan.php";
            $liste1 = $conn->query(" SELECT * FROM marka");
            $result=$liste1->fetchAll();
            foreach ($result as $row){
                echo "<option  value='".$row['idmarka']."'>".$row['markaadi']."</option>";
            }
            ?>
        </select>

        <label for="markaadi">Cihaz Adi</label>
        <input type="text" name="cihazadi" placeholder="Cihaz Adi Girin" required>
        <input type="submit" value="Ekle" name="cihazekle">
    </form>

    <?php

    if(isset($_POST["cihazekle"])){
        require_once "../baglan.php";
        $markaid=$_POST["markaid"];
        $cihazadi=$_POST["cihazadi"];

        $sql = "INSERT INTO cihaz (cihazadi,markaid) VALUES (:cihazadi, :markaid)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':cihazadi',$cihazadi);
        $stmt->bindParam(':markaid',$markaid);
        $stmt->execute();
        if($stmt){
           echo "Cihaz Eklendi";

            include "../yonlendirme.php";
            yonlendir("cihazekle.php");
        }
        else{
            $alert = "Hata Olustu";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        }
    }
    ?>
</div>
</div>


