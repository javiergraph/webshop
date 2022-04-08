<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}else{
    include('composants/header.php');

    if(isset($_GET['edit'])){
        require 'configs/db.php';
        $id = $_GET['edit'];
        $query="SELECT * FROM products WHERE id_product='".$id."'";
        $result = $conn->query($query);
        $produit = $result->fetch_assoc();
    }
?>

<h1>Modifier mon produit</h1>

<form action="functions/modify_product.php" method="post" enctype="multipart/form-data">
    <div class="container form-group">

        <input type="hidden" name="id_product" value="<?php echo $produit['id_product']?>">

        <label>Nom</label>
        <input class="form-control" type="text" name="nom" value="<?php echo $produit['nom']?>">
        <label>Prix</label>
        <input class="form-control" type="text" name="prix" value="<?php echo $produit['prix']?>">
        <label>Description</label>
        <input class="form-control" type="text" name="descripcion" value="<?php echo $produit['descripcion']?>" >
        <label>Stock</label>
        <input class="form-control" type="number" name="stock" value="<?php echo $produit['stock']?>">
        <label>Image</label>
        <input class="form-control-file" type="file" name="img">
        <br />
        <button class="form btn btn-primary" name="send" type="submit">Modifier</button>

    </div>
</form>

<?php
    
include('composants/footer.php');
}
?>


