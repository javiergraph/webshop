<?php

session_start();

if(!empty($_POST)){
    require 'configs/db.php';

    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $req = $pdo->prepare('SELECT * FROM admins WHERE username = :username');
        //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // securite password ici? 
        $req->execute(['username' => $_POST['username']]);
        $user = $req->fetch();

        if($user) {
            // if(password_verify($_POST['password'], $user->password)) {
            //     $_SESSION['user'] = $user;
            //     header('Location: admin.php');
            //     exit();
            // } else {
            //     $errors['general'] = "Mot de passe incorrect.";
            // }

            if($_POST['password'] === $user->password) {
                $_SESSION['user'] = $user;
                header('Location: admin.php');
                exit();
            } else {
                $errors['general'] = "Mot de passe incorrect.";
            }
        } else {
            $errors['general'] = "Utilisateur introuvable.";
        }
    } else {
        $errors['general'] = "Un des champs est vide.";
    }
    
}

if(isset($_SESSION['user'])){
    header('Location: admin.php');
    exit();
}else{
    include('composants/header.php');

    ?>
    <!-- Affichage des messages erreurs -->
    <?php if(!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div  class="container">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="User" name="username"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Mot de passe" name="password"/>
            </div>
            <button class="btn btn-dark btn-lg btn-block" name="send" type="submit">Entrez ici</button>
        </div>
    </form>

    <?php
    include('composants/footer.php');

}
?>
