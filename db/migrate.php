<?php
    require('./database.php');
    $sql = file_get_contents('payment_api.sql');
    // echo $sql;
    $db = new Database();

    $db->conn->query($sql);

    if($db->conn->query($sql) === true){
        echo 'Migration Success';
    } else {
        echo 'Migration Failed'.$db->conn->error;
    }
?>