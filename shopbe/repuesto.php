<?php

include('composants/header.php');
?>
<table class="container table">
    <thead class="thead-dark">
        <tr>
            <th>Nom du Workshop</th>
            <th>Nombre de tickets</th>
            <th>Prix</th>
        </tr> 
    </thead>
    <tbody>
<?php                    
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
    $achat_total = 0;
    foreach($panier as $produit){
        $produit = preg_split('/-/', $produit);
        $id_article = $produit[0];
        include "configs/db.php";
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        while($res = $result->fetch_assoc()){
            if ($res["id_product"]==$id_article){
                $nom_article = $res["nom"];
                $prix = $res["prix"];
            }
        }
        $prix_total = $produit[1] * $prix;
        $achat_total += $prix_total;
        ?>
            <tr>
                <?php
                    echo"<td>$nom_article</td>";
                    echo"<td>$produit[1]</td>";
                    echo"<td>$prix_total</td>";
                ?>
            </tr>
        <?php 
    } ?>        
    </tbody>
</table>  
    <?php
} else {
    echo("Pas d'achat");
}
?>
    <a href="index.html"><button type="button" class="btn btn-secondary btn-lg btn-block">
        Payez vous ici <span class="badge badge-light"><?php echo $achat_total;?>€</span>
    </button></a>
    <?php

include('composants/footer.php');