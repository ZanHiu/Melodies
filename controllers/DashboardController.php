<?php 
    switch($action){
        case 'adminboard':
            include "views/admin/adminboard.php";
            break;
        case 'artistboard':
            include "views/artist/artistboard.php";
            break;
    }
?>