<h3>SPECTACLES</h3>
<table>
<tr>
<th>ID</th>
<th>Date</th>
<th>Heure</th>
<th>Lieu</th>
<th>Atiste</th>
<th>Options</th>
</tr>

<?php 
$many = getAll();
$options = "
<button>UPDATE</button>
<button>DELETE</button>";
foreach($many as $one){
    echo "<tr>";
    foreach ($one as $key => $data){
        if ($key == 'idLieu'){
            $id = $data;
            $liuex= getCol('lieu', 'nomLieu');
            $data = $liuex[$id];
        }
        if($key == 'idArtistePrincipal'){
            $id = $data;
            $artistes = getCol('artiste', 'nomArtiste');
            $data = $artistes[$id];
        }

        

        echo "<td>", $data, "</td>";

    }
        echo "<td>", $options, "</td>";
        
    echo "</tr>";
}
echo "</table>";
echo "<br><br><br><br>";








?>