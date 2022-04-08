<?php
require "configs/config.php";

include('composants/header.php');

$_SESSION['delete'] = false;

include "configs/db.php";
$sql = "SELECT * FROM products";
//$pdo->exec($sql);
$result = $conn->query($sql);
?>
<div class="card-group container">
    <?php while($res = $result->fetch_assoc()){ ?>
        <div class="col-sm-4">
            <div class="row">
                <div class="col">
                    <img class="img-fluid" style="width: 16rem; height:13rem" src="<?php echo $res["img"]; ?>">
                    <ul class="card-body">
                        <li class="card-text">Formateur : <?php echo $res["nom"]; ?></li>
                        <li class="card-text">Prix : <?php echo $res["prix"];?>€</li>
                        <li class="card-text">Description : <?php echo $res["descripcion"]; ?></li>
                        <li class="card-text">Tickets dispo : <?php echo $res["stock"]; ?></li>
                    </ul>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Quantite</span>
                        </div>
                        <input class="form-control" type="number" id="quantite-<?php echo $res['id_product']?>" name="ajout_<?php echo $res["nom"]; ?>" value="1" min="1" max="<?php echo $res["stock"]; ?>">
                    </div>
                    <button class="btn btn-dark btn-block" type="button" id="add-to-cart" onclick="addToCart(<?php echo $res['id_product'];?>),ajouter()" >Ajouter</button>
                    <br>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include('composants/footer.php'); ?>

<script>hola()</script>