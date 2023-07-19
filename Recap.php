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
   
    <main>
    <h1>Recapitulatif</h1>
    <?php

        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table class='table'>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td class='qtt'>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td class='add_items'><a class='productPlus' title='add item' href='Traitement.php?action=productPlus&index=" . $index . "'>+</a></td>",
                    "<td class='remove_items'><a class='productMinus' title='remove item' href='Traitement.php?action=productMinus&index=" . $index . "'>-</a></td>",
                    "<td class='delete_items'><a class='deleteProduct' title='delete article' href='Traitement.php?action=deleteProduct&index=" . $index . "'>x</a></td>",
                 "</tr>";
            $totalGeneral+= $product['total'];       
        }
            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                 "</tr>",
                "</tbody>",
                "</table>";
        }
        
    ?>
    <a class='deleteAll' href="Traitement.php?action=deleteAll">Supprimer</a>
    </main>

</body>
</html>