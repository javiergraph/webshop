<?php 

    $conn = new mysqli('localhost','root', '', 'shopbe');

    if ($conn->connect_error){
        echo $error -> $conn->connect_error;
    }
    
    function clear($var){
        htmlspecialchars($var);
        return $var;
    }

    function redirectionner($var){
        ?>
        <script>
            window.location="<?=$var?>";
        </script>
        <?php
        die();
    }

    function alert($var){
        ?>
        <script type="text/javascript">
            alert("<?=$var?>");
        </script>
        <?php

    }
    
?> 