<?php
    include('composants/header.php');
?>
<div class="container">
    <h1>Réservez votre billet ici</h1>
    <h2>Il sera envoyé à votre email</h2>
    <br>
</div>

<form action="functions/include_client.php" method="post" enctype="multipart/form-data">

    <div class="container form-group">
        <label>Nom et Prenom</label>
        <input class="form-control" type="text" name="nom" >
        <label>Email</label>
        <input class="form-control" type="email" name="email">
        <label>Code postal</label>
        <input class="form-control" type="text" name="descripcion" >
        <label>Telephone</label>
        <input class="form-control" type="tel" name="stock" value="">
        <br />
        <button class="form btn btn-primary" name="send" type="submit">Charger</button>
    </div>
</form>

<?php
    
include('composants/footer.php');

?>


