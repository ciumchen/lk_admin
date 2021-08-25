<?php

namespace App\Exceptions;

use App\ErrorCode;
use Exception;

class LogicException extends Exception
{
    public function __construct(string $message = 'Logic exception.', $code = ErrorCode::CODE_DEFAULT)
    {

        parent::__construct($message, $code);
    }

    public function render()
    {
        $result = [
            'code' => (string)$this->getCode(),
            'msg'  => (string)$this->getMessage(),
        ];
        return response()->json($result);
    }

}
