<?php

namespace App\Http\Builder;

class ResponseBuilder {    
    protected $code, $data, $message, $success;

    public static function build($code = null, $success = null, $message = null, $data = null) {
        return [
           "code" => $code ?? 200,
           "success" => $success ?? true ,
           "message" => $message ?? "Ok",
           "data" => $data ?? null,
        ];
    }
}