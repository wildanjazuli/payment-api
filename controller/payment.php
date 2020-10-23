<?php
require('../db/database.php');

class Payment
{
    public function create($data)
    {
        $sql = sprintf("INSERT INTO transaction (invoice_id, item_name, amount, payment_type, customer_name, merchant_id, status, created_at) VALUES ('%s', '%s', '%s', '%s', '%s', '%s','%s', '%s')", 
        $data['invoice_id'], 
        $data['item_name'], 
        $data['amount'], 
        $data['payment_type'], 
        $data['customer_name'], 
        $data['merchant_id'], 
        PAYMENT_STATUS[0], 
        date('Y-m-d H:i:s'));

        $db = new Database();
        // die($sql);
        if ($db->conn->query($sql) === true) {
            return $data;
        } else {
            return false;
        }
    }

    public function find()
    {
    }
}
