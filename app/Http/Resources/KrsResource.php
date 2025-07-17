<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KrsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_code' => $this->kdmk,
            'course_name' => $this->matkulKurikulum->nmmk,
            'sks' => $this->sks,
            'schedule' => [
                'day' => $this->jadwalTawar->hari1->nama,
                'time' => $this->jadwalTawar->sesi1->jam,
                'room' => $this->jadwalTawar->ruang1->nama,
            ],
        ];
    }
}