<?php
include "databaseconn.php";


function isadmin(){
    if (isset($_SESSION['user_id'])){
        if ($_SESSION['userlevel'] == 1){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}



?>