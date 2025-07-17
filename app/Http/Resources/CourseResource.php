<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_code' => $this->kdmk,
            'course_name' => $this->matkulKurikulum->nmmk,
            'sks' => $this->matkulKurikulum->sks,
            'schedule' => [
                'day' => $this->hari1->nama,
                'time' => $this->sesi1->jam,
            ],
            'remaining_quota' => $this->jsisa,
        ];
    }
}