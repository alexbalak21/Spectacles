<h3>Creer Spectacle:</h3>
<form action="index.php" method="POST">
<!-- <label>Nombre </label><br>
<input type="number" name="id" min="100" > -->
<? ?>
<label>Date</label><br>
<input type="date" name="date"><br><br>
<label>Heure</label><br>
<input type="time" name="heure"><br><br>
<label for="lieu">Choisir Lieux:</label><br>
<select name="lieu">
<?php
    $lieux = getCol('lieu', 'nomLieu');
        foreach ($lieux as $key => $lieu)
        echo "<option value='$key'>$lieu</option>"
    ?>
</select><br><br>
<label for="artiste">Choisir Artiste:</label><br>
<select name="artiste">
<?php
    $artistes = getCol('artiste', 'nomArtiste');
        foreach ($artistes as $key => $artiste)
        echo "<option value='$key'>$artiste</option>"
    ?>
</select>

<br><br>
<input type="submit" name="submit" value="Creer">
</form>
<br>
<br>

<?php




