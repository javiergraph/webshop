<?php
session_start();

$_SESSION['delete'] = true;

if($_GET['id']){
    $panier = preg_split('/,/', $_SESSION['achat']);
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
    $id = $_GET['id']-1;
    unset($panier[array_search($panier[$id], $panier)]);
    $cookie = '["'.implode('","',$panier).'"]';
    $_SESSION['achat'] = $cookie;
    header("Location:../panier.php");
}else{
    header("Location:../panier.php");
}
