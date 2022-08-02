<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientIndexResource extends JsonResource
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
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'birthDate' => $this->birthDate,
            'gender' => $this->gender,
            'fathersName' => $this->fathersName,
            'mothersName' => $this->mothersName,
            'contact' => $this->contact,
            'barangay' => $this->barangay,
            'municipality' => $this->municipality,
            'province' => $this->province,
        ];
    }
}
