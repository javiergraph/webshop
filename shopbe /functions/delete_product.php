<?php
session_start();

require '../configs/db.php';// probe con esta en $sql use query select y no funciono, esta bien usarla asi o deberia usar objetos? ;
if(isset($_POST['id_product'])){
    $id = $_POST['id_product'];
    $sql= "DELETE FROM products WHERE id_product='".$id."'";
    $pdo->exec($sql);
    $_SESSION['flash']['success']="Produit supprimé";
    header("Location:../list-products.php");
    exit();
}

?>