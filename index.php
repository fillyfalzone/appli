<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
    require_once 'Head.php'
?>
<body>
<?php
    require_once 'Header.php'
?>
  
    <h1>Ajouter un produit</h1>
    <form id="form" action="traitement.php?action=add" method="post">
        <p class="p_input">
            <label>
                Nom du produit :
                <input class='input' type="text" name="name">
            </label>
        </p>
        <p class="p_input">
            <label>
                Prix du produit :
                <input class='input' type="number" step="any" name="price">
            </label>
        </p>
        <p class="p_input">
            <label>
                Quantité désirée :
                <input class='input' type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input class="submit" type="submit" name="submit" valur="Ajouter le produit">
        </p>
    </form>
</body>
</html>