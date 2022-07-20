<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacilityRequestRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Http\Requests\UpdateFacilityRequestStatus;
use App\Http\Resources\FacilityRequestResource;
use App\Models\FacilityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacilityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fac_requests = FacilityRequest::all();
        if($fac_requests->is_empty()){
            return ApiResponseClass::notFoundResponse('There is no requests yet');
        }
        return ApiResponseClass::successResponse(FacilityRequestResource::collection( $fac_requests));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacilityRequestRequest $request)
    {
        $fac_Req = $request->validated();
        $fac_Req['user_id'] = Auth::id();
        $new_req = FacilityRequest::create($fac_Req);
        return ApiResponseClass::successResponse(new FacilityRequestResource( $new_req));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fac_reqs = FacilityRequest::where('facility_id','=',$id)->get();
        if(!$fac_reqs->isEmpty()){
        return ApiResponseClass::successResponse(FacilityRequestResource::collection($fac_reqs));
        }else{
            return ApiResponseClass::notFoundResponse('There is no requests for this facility');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacilityRequestStatus $request, $id)
    {
        $fac_req = FacilityRequest::findOrFail($id);
        $fac_req->update($request->validated());
        return ApiResponseClass::successMsgResponse('Request Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
