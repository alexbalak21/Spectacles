<?php
//GET DATA TO UPDATE;
$id = $_GET['id'];
$data = searchBy('spectacle', 'idSpectacle', $id);

?>
<h3>Mettre à jour Spectacle:</h3>
<form action="action.php" method="POST">
<label>Numero du Spectacle</label><br>
<input type="number" name="id" value="<?=$data['idSpectacle']?>"><br><br>
<label>Date</label><br>
<input type="date" name="date" value="<?=$data['dateSpectacle']?>"><br><br>
<label>Heure</label><br>
<input type="time" name="heure" value="<?=$data['heure']?>"><br><br>
<label for="lieu">Choisir Lieux:</label><br>
<select name="lieu">
<?php
    $lieux = getCol('lieu', 'nomLieu');
        foreach ($lieux as $key => $lieu){
        $selected = '';
        if ($key == (INT)$data['idLieu'])
        $selected = "selected='selected'";
        echo "<option value='$key' $selected >$lieu</option>";
    }
    ?>
</select><br><br>
<label for="artiste">Choisir Artiste:</label><br>
<select name="artiste">
<?php
    $artistes = getCol('artiste', 'nomArtiste');
        foreach ($artistes as $key => $artiste){
            $selected = '';
            if ($key == (INT)$data['idArtistePrincipal'])
            $selected = "selected='selected'";
        echo "<option value='$key' $selected >$artiste</option>";
    }
?>
</select>
<br><br>
<input type="submit" name="submit" value="Mettre a Jour">
</form>
