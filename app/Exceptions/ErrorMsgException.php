<?php

namespace App\Exceptions;

//use App\Http\Controllers\Classes\ApiResponseClass;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class ErrorMsgException extends Exception
{
    protected $message;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = empty($message)?'some thing went wrong':$message;

        parent::__construct($message, $code, $previous);
    }


    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {


    }

    public function render($request)
    {
        return response()->json(['error' =>$this->message ],400);

    }
}
