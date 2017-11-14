<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Data extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'temp_max' => $this->temp_max,
            'temp_min' => $this->temp_min,
            'temp' => $this->temp,
        ];
        // return parent::toArray($request);
    }
}
