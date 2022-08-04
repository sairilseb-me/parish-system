<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaptismIndexResource extends JsonResource
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
            'client_id'=> $this->client_id,
            'baptised_date' => $this->baptised_date,
            'priest' => $this->priest,
            'sponsors' => $this->sponsors,
            'dated' => $this->dated,
            'series_of' => $this->series_of,
            'book_number' => $this->book_number,
            'page' => $this->page,
            'purpose' => $this->purpose,
        ];
    }
}
