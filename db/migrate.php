<?php
    require('./database.php');
    $sql = file_get_contents('payment_api.sql');

    $db = new Database();

    if($db->conn->multi_query($sql) === true){
        echo 'Migration Success';
    } else {
        echo 'Migration Failed'.$db->conn->error;
    }
