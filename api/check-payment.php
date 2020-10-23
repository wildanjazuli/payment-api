<?php

header("Content-Type: application/json");

require('../helpers/response.php');
require('../constants.php');
require('../controller/payment.php');

$is_error = true;
$data = [];

if (!isset($_GET['references_id'],
$_GET['merchant_id'])) {
    $status = 'Failed';
    $status_code = 001;
    $message = 'Error';
    $data = [];
} else {
    if (
        !empty($_GET['references_id']) &&
        !empty($_GET['merchant_id'])
    ) {
        $is_error = false;
        $payment = new Payment();
        $result_payment = $payment->find($_GET);
        $data = $result_payment;
        if (!$result_payment) {
            $is_error = true;
        }
    }

    $status = 'Success';
    $status_code = 000;
    $message = 'Success';
}

$result = new Response();
echo json_encode($result->check($is_error, $status_code, $message, $data));
