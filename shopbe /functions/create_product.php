<?php
session_start();
require '../configs/db.php';// probe con esta en $sql use query select y no funciono, esta bien usarla asi o deberia usar objetos? ;

if(!empty($_REQUEST["nom"]) && !empty($_REQUEST["prix"]) && !empty($_REQUEST["descripcion"]) && !empty($_REQUEST["stock"]) && !empty($_FILES["img"]["name"])){
    $nom=$_REQUEST["nom"];
    $prix=$_REQUEST["prix"];
    $descripcion=$_REQUEST["descripcion"];
    $stock = $_REQUEST["stock"];
    $img=$_FILES["img"]["name"];
    $direccion=$_FILES["img"]["tmp_name"];
    $dossier="../img/".$img;
    copy($direccion,$dossier);
    $image="img/".$img;
    $sql= "INSERT INTO products (nom, prix, descripcion, img, stock) VALUES ('$nom','$prix', '$descripcion', '$image', '$stock')";
    $pdo->exec($sql);
    $_SESSION['flash']['success']="Produit Créé";
    header("Location:../admin.php");
    exit();
}else{
    $_SESSION['flash']['error']="Un des champs est vide!";
    header("Location:../admin.php");
    exit();
}
?>