<?php 
require "configs/config.php";
include('composants/header.php'); ?>

<?php

    // if(isset($_SESSION['achat']) && $_SESSION['achat'] === '[""]') {
    //     unset($_SESSION['achat']);
    // }
    // Si session delete est à faux : stocke le cookie achat (les éléments dans le panier) dans la session achat
    if(!isset($_SESSION['achat']) && isset($_COOKIE['achat']) && $_SESSION['delete'] == false){
        $_SESSION['achat'] = $_COOKIE['achat'];
    } 

  
    
    if(isset($_COOKIE['panier']) && $_COOKIE['panier'] != 0) {
        $panier = preg_split('/,/', $_COOKIE['achat']);
        if(count($panier) == 1) {
            for($i=0; $i < count($panier); $i++ ) {
                $panier[$i] = substr($panier[$i], 2, -2);
            }
        } else  {
            for($i=0; $i < count($panier); $i++ ) {
                if($i === 0) {
                    $panier[$i] = substr($panier[$i], 2, -1);
                } elseif ($i === count($panier)-1) {
                    $panier[$i] = substr($panier[$i], 1, -2);
                } else {
                    $panier[$i] = substr($panier[$i], 1, -1);
                }
            }
        }
        $achat_total = 0;?>
        <table class="container table">
            <thead class="thead-dark">
                <tr>
                    <th>Nom du Workshop</th>
                    <th>Nombre de tickets</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr> 
            </thead>
            <tbody>
        <?php 
        foreach($panier as $key => $produit){
            $produit = preg_split('/-/', $produit);
            $id_article = $produit[0];
            include "configs/db.php";
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            while($res = $result->fetch_assoc()){
                if ($res["id_product"]==$id_article){
                    $nom_article = $res["descripcion"];
                    $prix = $res["prix"];
                }
            }
            $prix_total = $produit[1] * $prix;
            $achat_total += $prix_total;
            $id = $key +1;
            ?>
                <tr>
                    <?php
                        echo"<td>$nom_article</td>";
                        echo"<td>$produit[1]</td>";
                        echo"<td>$prix_total</td>";
                        echo"<td><a href='functions/delete_achat.php?id=$id'><button class='btn btn-danger' onclick='eraser()'>supprimer</button></a></td>";
                    ?>
                </tr>
            <?php 
        }
        ?>
            </tbody>
        </table>
        <div><a href="payer.php"><button type="button" class="btn btn-secondary btn-lg btn-block">
            Payez vous ici <span class="badge badge-light"><?php echo $achat_total;?>€</span>
        </button></a></div>
        <?php
    }
    
    
?>

<?php
include('composants/footer.php');
?>
