<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class KrsResource extends JsonResource
{
    public function toArray($request)
    {
        $schedules = [];
        if ($this->jadwalTawar->id_hari1 && $this->jadwalTawar->id_sesi1) {
            $schedules[] = [
                'day' => $this->jadwalTawar->hari1->nama,
                'time' => $this->jadwalTawar->sesi1->jam,
                'room' => $this->jadwalTawar->ruang1->nama,
            ];
        }
        if ($this->jadwalTawar->id_hari2 && $this->jadwalTawar->id_sesi2) {
            $schedules[] = [
                'day' => $this->jadwalTawar->hari2->nama,
                'time' => $this->jadwalTawar->sesi2->jam,
                'room' => $this->jadwalTawar->ruang2->nama,
            ];
        }
        if ($this->jadwalTawar->id_hari3 && $this->jadwalTawar->id_sesi3) {
            $schedules[] = [
                'day' => $this->jadwalTawar->hari3->nama,
                'time' => $this->jadwalTawar->sesi3->jam,
                'room' => $this->jadwalTawar->ruang3->nama,
            ];
        }

        return [
            'id' => $this->id,
            'course_code' => $this->kdmk,
            'course_name' => $this->matkulKurikulum->nmmk,
            'sks' => $this->sks,
            'schedules' => $schedules,
        ];
    }
}