<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'          => $this->id,
            'facility_id' => $this->facility_id ,
            'type'        => $this->type,
            'status'      => $this->status,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
        ];
    }
}
