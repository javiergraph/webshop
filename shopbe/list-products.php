<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}else{
    include('composants/header.php');
        

include "configs/db.php";
$sql = "SELECT * FROM products";
//$pdo->exec($sql);
$result = $conn->query($sql);


$produits = $result->fetch_all();

?>

<h1 class="text-center">Mes Produits</h1>
<table class="container table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>image</th>
            <th>nom</th>
            <th>prix</th>
            <th>description</th>
            <th>Stock</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        foreach($produits as $produit){
            echo "<tr>";
                echo "<td>$produit[0]</td>";
                echo '<td><img src="'."$produit[4]".'"width="40" heigth="40"></td>';
                echo "<td>$produit[1]</td>";
                echo "<td>$produit[2]€</td>";
                echo "<td>$produit[3]</td>";
                echo "<td>$produit[5]</td>";
                echo "<td><a href='modify.php?edit=".$produit[0]."'><button class='form btn btn-outline-dark btn-block'>Editer</button></a>";
                echo '<form action="functions/delete_product.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="id_product" value="'.$produit[0].'">';
                echo '<button class="form btn btn-danger btn-block" name="send" type="submit">Supprimer</button>';
                echo "</form></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php 
include('composants/footer.php');
}
?>
