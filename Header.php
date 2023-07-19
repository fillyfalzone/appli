
<?php
// Le header de l'appli générer en php    
    echo    "<header>",
            "<nav class='navbar'>",
                "<ul>",
                    "<li><a href='index.php'>Acceuil</a></li>",
                    "<li class='li_basket'><a href='Recap.php' class='panier'>Panier<img class='basket' src='imgs/basket.svg' alt='pagnier'>";
                    if( isset($_SESSION['products']) && !empty($_SESSION['products']) ){
                        //affichage du nombre d'article
                        //on verifie si la variable est definie et non vide
                        $totalProducts = count($_SESSION['products']);
                        echo "<span class='nbArticles'>".$totalProducts."</span>";
                    }
                    else{
                        echo "<span class='nbArticles'></span>"; 
                    }
    echo                "</a></li>",
                "</ul>",
            "</nav>",
        "</header>";

?>