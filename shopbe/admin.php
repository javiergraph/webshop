<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}else{
    include('composants/header.php');
        
?>
<div class="container">
    <h1>Bienvenue! Admin</h1>
    <h2>Créer un nouveau produit</h2>
    <br>
</div>

<form action="functions/create_product.php" method="post" enctype="multipart/form-data">

    <div class="container form-group">
        <label>Nom du Produit</label>
        <input class="form-control" type="text" name="nom" >
        <label>Prix</label>
        <input class="form-control" type="number" name="prix" value="0" >
        <label>Description</label>
        <input class="form-control" type="text" name="descripcion" >
        <label>Stock</label>
        <input class="form-control" type="number" name="stock" value="0">
        <label>Image</label>
        <input class="form-control-file" type="file" name="img" >
        <br />
        <button class="form btn btn-primary" name="send" type="submit">Charger</button>
    </div>
</form>
<div>
    <div class="container">
        <a  href="list-products.php"><button class="btn btn-success">Editer</button></a>
        <a href="logout.php"><button class="btn btn-danger">Se deconnecter</button></a>
    </div>
</div>
<?php
    
include('composants/footer.php');
}
?>


