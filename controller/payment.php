<?php
require('../db/database.php');

class Payment
{
    public function create($data)
    {
        $sql = sprintf(
            "INSERT INTO transaction (invoice_id, item_name, amount, payment_type, customer_name, merchant_id, references_id, status, created_at) VALUES ('%s', '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s')",
            $data['invoice_id'],
            $data['item_name'],
            $data['amount'],
            $data['payment_type'],
            $data['customer_name'],
            $data['merchant_id'],
            $data['references_id'],
            PAYMENT_STATUS[0],
            date('Y-m-d H:i:s')
        );

        $db = new Database();

        if ($db->conn->query($sql) === true) {
            return $data;
        } else {
            return false;
        }
    }

    public function find($data)
    {
        $sql = sprintf("SELECT references_id, invoice_id, status FROM transaction WHERE references_id = '%s' AND merchant_id = '%s' LIMIT 1", $data['references_id'], $data['merchant_id']);

        $db = new Database();
        $result = $db->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $sql = sprintf("UPDATE transaction SET status = '%s' WHERE  references_id = '%s'", $data['status'], $data['references_id']);

        $db = new Database();
        $db->conn->query($sql);
        return $db->conn->affected_rows;
    }
}
