<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KrsStatusResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'validation_status' => $this->resource['validation_status'],
            'total_sks' => $this->resource['total_sks'],
            'previous_ips' => $this->resource['previous_ips'],
        ];
    }
}