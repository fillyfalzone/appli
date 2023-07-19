<?php
    session_start();


    //switch si il y a une action 
    switch(isset($_GET['action'])){

        case $_GET['action'] === "add" :

            if(isset($_POST['submit'])){
                //Filtrer les champs des diferents input 
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    
                    if($name && $price && $qtt){
                    
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION['products'][] = $product;
                    }
                }
            break;


        case $_GET['action'] === "deleteAll" :
             // Code pour supprimer tous les produits
            unset($_SESSION['products']);
            header("Location: Recap.php");
            exit(); // Terminer le script pour éviter toute exécution supplémentaire

            break;

            case $_GET['action'] === "productPlus":
                // Code pour augmenter la quantité d'un produit
                if(isset($_GET['index'])) {
                    $index = $_GET['index'];
                    if(isset($_SESSION['products'][$index])) {
                        $_SESSION['products'][$index]['qtt']++;
                        $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['price'] * $_SESSION['products'][$index]['qtt'];
                    }
                }
            header("Location: Recap.php");
            exit(); // Terminer le script pour éviter toute exécution supplémentaire
            break;

        case $_GET['action'] === "productMinus" :
            // Code pour diminuer la quantité d'un produit
             if(isset($_GET['index'])) {
                $index = $_GET['index'];
                if(isset($_SESSION['products'][$index])) {
                    $_SESSION['products'][$index]['qtt']--;
                    if($_SESSION['products'][$index]['qtt'] < 1) {
                        unset($_SESSION['products'][$index]);
                    } else {
                        $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['price'] * $_SESSION['products'][$index]['qtt'];
                    }
                }
            }
            header("Location: Recap.php");
            exit(); // Terminer le script pour éviter toute exécution supplémentaire
            break;

        case $_GET['action'] === "deleteProduct" :
             // Code pour supprimer un produit spécifique
            if(isset($_GET['index'])) {
                $index = $_GET['index'];
                if(isset($_SESSION['products'][$index])) {
                    unset($_SESSION['products'][$index]);
                }
            }
            header("Location: Recap.php");
            exit(); // Terminer le script pour éviter toute exécution supplémentaire
        break;

        default :
             // Code à exécuter si aucune action n'est spécifiée
        ;
    //condition de limitation de l'accès à traitement.php aux requêtes HTTP provenant de la soumission  de notre formulaire
    };    
    header("Location:index.php");
?>