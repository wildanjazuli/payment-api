<?php

class Response {
    public static function create ($is_error, $code, $message, $data) {
        $result = [];
        $response = '';
        if($is_error){
            $response = 'Failed';
            $result['response'] = $response;
        } else {
            $response = 'Success';
            $result['references_id'] = $data['references_id']??'';
            $result['number_va'] = $data['number_va']??'';
            $result['status'] = $data['status']??'';
            $result['response'] = [ 
                'code' => $code, 
                'message' => $message, 
                'status' => $response
            ];
        }

        return $result;
    }

    public static function check ($is_error, $code, $message, $data) {
        $result = [];
        $response = '';
        if($is_error){
            $response = 'Failed';
            $result['response'] = $response;
        } else {
            $response = 'Success';
            $result['references_id'] = $data['references_id']??'';
            $result['invoice_id'] = $data['invoice_id']??'';
            $result['status'] = $data['status']??'';
            $result['response'] = [ 
                'code' => $code, 
                'message' => $message, 
                'status' => $response
            ];
        }

        return $result;
    }
}
?>