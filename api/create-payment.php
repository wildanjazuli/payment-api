<?php

header("Content-Type: application/json");

require('../helpers/response.php');
require('../constants.php');
require('../controller/payment.php');
require('../config/config.php');

$is_error = true;
$data = [];

if(!isset(
    $_GET['invoice_id'],
    $_GET['item_name'],
    $_GET['amount'],
    $_GET['payment_type'],
    $_GET['customer_name'],
    $_GET['merchant_id']
)) {
    $status = 'Failed';
    $status_code = 001;
    $message = 'Error';
    $data = [];
} else {
    if(!empty($_GET['invoice_id']) && 
        !empty($_GET['item_name']) &&
        !empty($_GET['amount']) &&
        !empty($_GET['payment_type']) &&
        !empty($_GET['customer_name']) &&
        !empty($_GET['merchant_id'])
    ){
        if(in_array($_GET['payment_type'], PAYMENT_TYPE) && is_numeric($_GET['amount'])){
            if($_GET['payment_type'] === 'virtual_account'){
                $data['number_va'] = mt_rand();
            }
            $data['references_id'] = mt_rand();
            $data['status'] = PAYMENT_STATUS['0'];
            $is_error = false;    
            $payment = new Payment();
            $request = $_GET;
            $request['references_id'] = $data['references_id'];
            $result_payment = $payment->create($request);
            if(!$result_payment) {
                $is_error = true;
            }
        }
    }
    
    $status = 'Success';
    $status_code = 000;
    $message = 'Success';
}

$result = new Response();
echo json_encode($result->create($is_error, $status_code, $message, $data));
