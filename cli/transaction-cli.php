<?php

require('../controller/payment.php');
require('../constants.php');

if (count($argv) != 3) {
    exit('Failed');
}
$is_error = true;

if (!in_array($argv[2], PAYMENT_STATUS)) {
    exit('Failed');
}
$payment = new Payment();

$data = ['references_id' => $argv[1], 'status' => $argv[2]];
$result_payment = $payment->update($data);

if ($result_payment > 0) {
    $is_error = false;
}

if ($is_error) {
    echo json_encode($argv) . ' => Failed';
} else {
    echo json_encode($argv) . ' => Success';
}
