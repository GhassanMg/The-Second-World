<?php


namespace App\Http\Controllers\Classes;


class ApiResponseClass
{
    public static function successResponse($data){
        return response()->json([
            'message'=>trans('messages.successfully'),
            'success'=>'true',
            'status_code'=>200,
            'data'=>$data],
            200);
    }

    public static function validateResponse($errors){
        return response()->json([
            'message'=>trans('messages.validation_error'),
            'success'=>'false',
            'status_code'=>422,
            'errors'=>$errors->all()],
            422);

    }

    public static function deletedResponse($msg=null){
        if(is_null($msg)) $msg = trans('messages.deleted');
        return response()->json([
            'message'=>$msg,
            'success'=>'true',
            'status_code'=>200,
            'data'=>[]],
            200);
    }


    public static function successMsgResponse($msg=null){
        if(is_null($msg)) $msg = trans('messages.successfully');
        return response()->json([
            'message'=>$msg,
            'success'=>'true',
            'status_code'=>200,
            'data'=>[]],
            200);
    }

    public static function notFoundResponse($msg=null){
        if(is_null($msg)) $msg = trans('messages.not_found');

        return response()->json([
            'message'=>$msg,
            'success'=>'false',
            'status_code'=>404,
            'errors'=>[$msg]],
            404);
    }

    public static function unauthorizedResponse(){
        return response()->json([
            'message'=>trans('messages.unAuthorized'),
            'success'=>'false',
            'status_code'=>403,
            'errors'=>[trans('messages.unAuthorized')]],
            403);
    }

    public static function errorMsgResponse($msg=null){
        if(is_null($msg)) $msg = trans('messages.some_thing_went_wrong');

        return response()->json([
            'message'=>$msg,
            'success'=>'false',
            'status_code'=>400,
            'errors'=>[$msg]],
            400);
    }
}
