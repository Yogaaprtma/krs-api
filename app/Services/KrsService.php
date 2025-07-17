<?php

namespace App\Services;

use App\Models\KrsRecord;
use App\Models\IpSemester;
use App\Models\DaftarNilai;
use App\Models\JadwalTawar;
use App\Models\TahunAjaran;
use App\Models\KrsRecordLog;
use Illuminate\Http\Request;
use App\Models\MahasiswaDinus;
use App\Models\ValidasiKrsMhs;
use App\Models\MatkulKurikulum;
use App\Models\SesiKuliahBentrok;
use Illuminate\Support\Facades\Log;

class KrsService
{
    public function getCurrentKrs($nim)
    {
        $activeTa = TahunAjaran::where('set_aktif', 1)->first();
        if (!$activeTa) {
            throw new \Exception('No active academic year found', 404);
        }

        return KrsRecord::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->with(['jadwalTawar', 'matkulKurikulum'])
            ->get();
    }

    // coba
    public function getAvailableCourses($nim)
    {
        $student = MahasiswaDinus::where('nim_dinus', $nim)->first();
        if (!$student) {
            throw new \Exception('Student not found', 404);
        }

        $activeTa = TahunAjaran::where('set_aktif', 1)->first();
        if (!$activeTa) {
            throw new \Exception('No active academic year found', 404);
        }

        $existingKrs = KrsRecord::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->pluck('id_jadwal');

        $passedCourses = DaftarNilai::where('nim_dinus', $nim)
            ->where('nl', 'A')
            ->pluck('kdmk');

        $query = JadwalTawar::where('ta', $activeTa->kode)
            ->whereHas('matkulKurikulum', function ($query) use ($student) {
                $query->where('kur_aktif', 1)
                      ->where('kur_nama', 'LIKE', $student->prodi . '.KUR%');
            })
            ->whereNotIn('kdmk', $passedCourses)
            ->where('jsisa', '>', 0)
            ->where('open_class', 1)
            ->whereNotIn('id', $existingKrs)
            ->with(['matkulKurikulum', 'hari1', 'sesi1', 'hari2', 'sesi2', 'hari3', 'sesi3']);

        Log::info('Available Courses Query', [
            'nim' => $nim,
            'ta' => $activeTa->kode,
            'prodi' => $student->prodi,
            'existing_krs' => $existingKrs->toArray(),
            'passed_courses' => $passedCourses->toArray(),
            'query_result' => $query->get()->toArray(),
        ]);

        $availableCourses = $query->get()
            ->filter(function ($jadwal) use ($existingKrs) {
                $existingSchedules = JadwalTawar::whereIn('id', $existingKrs)
                    ->with(['sesi1', 'sesi2', 'sesi3'])
                    ->get()
                    ->flatMap(function ($schedule) {
                        $slots = [];
                        if ($schedule->id_hari1 && $schedule->id_sesi1) {
                            $slots[] = ['hari' => $schedule->id_hari1, 'sesi' => $schedule->id_sesi1];
                        }
                        if ($schedule->id_hari2 && $schedule->id_sesi2) {
                            $slots[] = ['hari' => $schedule->id_hari2, 'sesi' => $schedule->id_sesi2];
                        }
                        if ($schedule->id_hari3 && $schedule->id_sesi3) {
                            $slots[] = ['hari' => $schedule->id_hari3, 'sesi' => $schedule->id_sesi3];
                        }
                        return $slots;
                    });

                $newScheduleSlots = [];
                if ($jadwal->id_hari1 && $jadwal->id_sesi1) {
                    $newScheduleSlots[] = ['hari' => $jadwal->id_hari1, 'sesi' => $jadwal->id_sesi1];
                }
                if ($jadwal->id_hari2 && $jadwal->id_sesi2) {
                    $newScheduleSlots[] = ['hari' => $jadwal->id_hari2, 'sesi' => $jadwal->id_sesi2];
                }
                if ($jadwal->id_hari3 && $jadwal->id_sesi3) {
                    $newScheduleSlots[] = ['hari' => $jadwal->id_hari3, 'sesi' => $jadwal->id_sesi3];
                }

                foreach ($newScheduleSlots as $newSlot) {
                    foreach ($existingSchedules as $existingSlot) {
                        if ($newSlot['hari'] == $existingSlot['hari']) {
                            $conflict = SesiKuliahBentrok::where('id', $newSlot['sesi'])
                                ->where('id_bentrok', $existingSlot['sesi'])
                                ->exists();
                            if ($conflict) {
                                Log::info('Schedule conflict detected', [
                                    'jadwal_id' => $jadwal->id,
                                    'new_slot' => $newSlot,
                                    'existing_slot' => $existingSlot,
                                ]);
                                return false;
                            }
                        }
                    }
                }
                return true;
            });

        Log::info('Filtered Available Courses', [
            'result' => $availableCourses->toArray(),
        ]);

        return $availableCourses;
    }

    public function registerCourse($nim, $scheduleId, Request $request)
    {
        $student = MahasiswaDinus::where('nim_dinus', $nim)->first();
        if (!$student) {
            throw new \Exception('Student not found', 404);
        }

        $activeTa = TahunAjaran::where('set_aktif', 1)->first();
        if (!$activeTa) {
            throw new \Exception('No active academic year found', 404);
        }

        $jadwal = JadwalTawar::where('id', $scheduleId)
            ->where('ta', $activeTa->kode)
            ->where('jsisa', '>', 0)
            ->where('open_class', 1)
            ->first();

        if (!$jadwal) {
            throw new \Exception('Schedule not available or class is full', 404);
        }

        $krsValidated = ValidasiKrsMhs::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->exists();

        if ($krsValidated) {
            throw new \Exception('KRS already validated', 403);
        }

        $matkul = MatkulKurikulum::where('kdmk', $jadwal->kdmk)
            ->where('kur_aktif', 1)
            ->where('kur_nama', 'LIKE', $student->prodi . '.KUR%')
            ->first();

        if (!$matkul) {
            throw new \Exception('Course not in student\'s curriculum', 403);
        }

        $existingKrs = KrsRecord::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->pluck('id_jadwal');

        $existingSchedules = JadwalTawar::whereIn('id', $existingKrs)
            ->get()
            ->flatMap(function ($schedule) {
                $slots = [];
                if ($schedule->id_hari1 && $schedule->id_sesi1) {
                    $slots[] = ['hari' => $schedule->id_hari1, 'sesi' => $schedule->id_sesi1];
                }
                if ($schedule->id_hari2 && $schedule->id_sesi2) {
                    $slots[] = ['hari' => $schedule->id_hari2, 'sesi' => $schedule->id_sesi2];
                }
                if ($schedule->id_hari3 && $schedule->id_sesi3) {
                    $slots[] = ['hari' => $schedule->id_hari3, 'sesi' => $schedule->id_sesi3];
                }
                return $slots;
            });

        $newScheduleSlots = [];
        if ($jadwal->id_hari1 && $jadwal->id_sesi1) {
            $newScheduleSlots[] = ['hari' => $jadwal->id_hari1, 'sesi' => $jadwal->id_sesi1];
        }
        if ($jadwal->id_hari2 && $jadwal->id_sesi2) {
            $newScheduleSlots[] = ['hari' => $jadwal->id_hari2, 'sesi' => $jadwal->id_sesi2];
        }
        if ($jadwal->id_hari3 && $jadwal->id_sesi3) {
            $newScheduleSlots[] = ['hari' => $jadwal->id_hari3, 'sesi' => $jadwal->id_sesi3];
        }

        foreach ($newScheduleSlots as $newSlot) {
            foreach ($existingSchedules as $existingSlot) {
                if ($newSlot['hari'] == $existingSlot['hari']) {
                    $conflict = SesiKuliahBentrok::where('id', $newSlot['sesi'])
                        ->where('id_bentrok', $existingSlot['sesi'])
                        ->exists();
                    if ($conflict) {
                        throw new \Exception('Schedule conflict detected', 403);
                    }
                }
            }
        }

        $krs = KrsRecord::create([
            'ta' => $activeTa->kode,
            'kdmk' => $jadwal->kdmk,
            'id_jadwal' => $jadwal->id,
            'nim_dinus' => $nim,
            'sts' => 'B',
            'sks' => $matkul->sks,
            'modul' => 0,
        ]);

        $jadwal->decrement('jsisa');

        KrsRecordLog::create([
            'id_krs' => $krs->id,
            'nim_dinus' => $nim,
            'kdmk' => $jadwal->kdmk,
            'aksi' => 1,
            'id_jadwal' => $jadwal->id,
            'ip_addr' => $request->ip(),
        ]);

        return $krs;
    }

    public function removeCourse($nim, $scheduleId, Request $request)
    {
        $student = MahasiswaDinus::where('nim_dinus', $nim)->first();
        if (!$student) {
            throw new \Exception('Student not found', 404);
        }

        $activeTa = TahunAjaran::where('set_aktif', 1)->first();
        if (!$activeTa) {
            throw new \Exception('No active academic year found', 404);
        }

        $krsValidated = ValidasiKrsMhs::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->exists();

        if ($krsValidated) {
            throw new \Exception('KRS already validated', 403);
        }

        $krs = KrsRecord::where('nim_dinus', $nim)
            ->where('id_jadwal', $scheduleId)
            ->where('ta', $activeTa->kode)
            ->first();

        if (!$krs) {
            throw new \Exception('KRS record not found for this schedule', 404);
        }

        $jadwal = JadwalTawar::find($scheduleId);
        if (!$jadwal) {
            throw new \Exception('Schedule not found', 404);
        }

        $jadwal->increment('jsisa');

        KrsRecordLog::create([
            'id_krs' => $krs->id,
            'nim_dinus' => $nim,
            'kdmk' => $krs->kdmk,
            'aksi' => 2,
            'id_jadwal' => $scheduleId,
            'ip_addr' => $request->ip(),
        ]);

        $krs->delete();

        return true;
    }

    public function getKrsStatus($nim)
    {
        $student = MahasiswaDinus::where('nim_dinus', $nim)->first();
        if (!$student) {
            throw new \Exception('Student not found', 404);
        }

        $activeTa = TahunAjaran::where('set_aktif', 1)->first();
        if (!$activeTa) {
            throw new \Exception('No active academic year found', 404);
        }

        $validationStatus = ValidasiKrsMhs::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->first();

        $totalSks = KrsRecord::where('nim_dinus', $nim)
            ->where('ta', $activeTa->kode)
            ->sum('sks');

        $previousIps = IpSemester::where('nim_dinus', $nim)
            ->where('ta', '<', $activeTa->kode)
            ->orderBy('ta', 'desc')
            ->first();

        return [
            'validation_status' => $validationStatus ? 'Validated' : 'Not Validated',
            'total_sks' => $totalSks,
            'previous_ips' => $previousIps ? $previousIps->ips : 'N/A',
        ];
    }
}