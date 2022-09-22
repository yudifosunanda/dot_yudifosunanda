<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
        'city_id'=>$this->city_id,
        'province_id'=>$this->province_id,
        'province'=>$this->province->province,
        'type'=>$this->type,
        'city_name'=>$this->city_name,
        'postal_code'=>$this->postal_code
      ];
    }
}
