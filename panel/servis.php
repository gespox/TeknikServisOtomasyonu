<?php

?>
<table id="servis">
        <tr >
            <th>Must.Adı</th>
            <th>Soyad</th>
            <th>Telefon</th>
            <th>Mail</th>
            <th>Marka</th>
            <th>Cihaz</th>
            <th>Seri No</th>
            <th>Model No</th>
            <th>Teslim Trh</th>
            <th>Açıklama</th>
            <th>Garanti</th>
        </tr>
    <?php
     require_once "../baglan.php";
            $liste = $conn->query(" SELECT * FROM servis INNER JOIN musteri ON musteri.idmusteri=servis.musteriid 
                                    INNER JOIN cihaz ON servis.cihazid=cihaz.idcihaz
                                    INNER JOIN marka ON servis.markaid=marka.idmarka",PDO::FETCH_ASSOC);
                foreach ($liste as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["ad"] . "</td>";
                    echo "<td>" . $row["soyad"] . "</td>";
                    echo "<td>" . $row["telefon"] . "</td>";
                    echo "<td>" . $row["mail"] . "</td>";
                    echo "<td>" . $row["markaadi"] . "</td>";
                    echo "<td>" . $row["cihazadi"] . "</td>";
                    echo "<td>" . $row["serino"] . "</td>";
                    echo "<td>" . $row["modelno"] . "</td>";
                    echo "<td>" . $row["teslimtarihi"] . "</td>";
                    echo "<td>" . $row["aciklama"] . "</td>";
                    if ($row["garanti"] == 1) {
                        echo "<td>" . "Var" . "</td>";
                    } else {
                        echo "<td>" . "Yok" . "</td>";
                    }
                    echo "<tr>";
                }
     ?>
</table>