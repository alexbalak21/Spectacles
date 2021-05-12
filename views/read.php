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
$update = "
<form action='index.php' method='GET'>
  <input type='hidden' name='id' value='102' />
  <input type='submit' name='update' value='UPDATE' />
</form>";

$delete= "
<form action='index.php' method='GET'>
  <input type='hidden' name='id' value='102' />
  <input type='submit' name='update' value='DELETE' />
</form>";

foreach($many as $one){
    echo "<tr>";
    foreach ($one as $key => $data){
        if ($key == 'idLieu'){
            $idLieu = $data;
            $liuex= getCol('lieu', 'nomLieu');
            $data = $liuex[$idLieu];
        }
        if($key == 'idArtistePrincipal'){
            $idArtiste = $data;
            $artistes = getCol('artiste', 'nomArtiste');
            $data = $artistes[$idArtiste];
        }
        $id = $one['idSpectacle'];
        echo "<td>", $data, "</td>";
        $update = "<form action='index.php' method='GET'>
  <input type='hidden' name='id' value='$id' />
  <input type='submit' name='update' value='UPDATE' /></form>";
$delete= "<form action='action.php' method='GET'>
  <input type='hidden' name='id' value='$id' />
  <input type='submit' name='delete' value='DELETE' />
  </form>
  ";
}
    echo "<td>",$update, $delete,"</td>";
        
    echo "</tr>";
}
echo "</table>";
echo "<br><br><br><br>";










?>