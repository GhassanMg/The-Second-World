<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Classes\ApiResponseClass;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use ValidateRequests;
class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::with('points')->get();
        if($facilities->isEmpty()){
            return ApiResponseClass::notFoundResponse();
        }else{
            return ApiResponseClass::successResponse(FacilityResource::collection($facilities));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacilityRequest $request)
    {
        $facility= $request->validated();
        $newFacility = Facility::create($facility);
        foreach($request->points as $point){
            $newpoint = new Point();
            $newpoint->lang = $point['lang'];
            $newpoint->lat = $point['lat'];
            $newpoint->facility_id = $newFacility->id;
            $newpoint->save();
        }
        return ApiResponseClass::successMsgResponse('added successfully');
    }
    public function buy($id,$user){
        $facility = Facility::where('id',$id)->first();
        if($facility->status==1){
            if($facility::doesntHave('user')){

            }
            else{

            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(auth()->user());
        dd(Auth::user());
        $facility = Facility::where('id',$id)->with('points')->get();
        if($facility->isEmpty()){
            return ApiResponseClass::notFoundResponse();
        }else{
            return ApiResponseClass::successResponse(FacilityResource::collection($facility));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacilityRequest $request, $id)
    {
        $facility = Facility::where('id',$id);
        $validated = $request->validated();
        $facility->update($validated);
        return ApiResponseClass::successMsgResponse('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return ApiResponseClass::deletedResponse();
    }
}





