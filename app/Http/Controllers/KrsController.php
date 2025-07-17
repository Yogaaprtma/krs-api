<?php

namespace App\Http\Controllers;

use App\Http\Resources\KrsResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\KrsStatusResource;
use App\Http\Requests\RegisterCourseRequest;
use App\Services\KrsService;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    protected $krsService;

    public function __construct(KrsService $krsService)
    {
        $this->krsService = $krsService;
    }

    public function currentKrs($nim)
    {
        try {
            $krsRecords = $this->krsService->getCurrentKrs($nim);
            return KrsResource::collection($krsRecords);
        } catch (\Exception $e) {
            // Konversi kode status ke integer
            $statusCode = is_numeric($e->getCode()) ? (int) $e->getCode() : 500;
            return response()->json(['error' => $e->getMessage()], $statusCode);
        }
    }

    public function availableCourses($nim)
    {
        try {
            $availableCourses = $this->krsService->getAvailableCourses($nim);
            return CourseResource::collection($availableCourses);
        } catch (\Exception $e) {
            // Konversi kode status ke integer
            $statusCode = is_numeric($e->getCode()) ? (int) $e->getCode() : 500;
            return response()->json(['error' => $e->getMessage()], $statusCode);
        }
    }

    public function registerCourse(RegisterCourseRequest $request, $nim)
    {
        try {
            $this->krsService->registerCourse($nim, $request->schedule_id, $request);
            return response()->json(['message' => 'Course registered successfully'], 201);
        } catch (\Exception $e) {
            // Konversi kode status ke integer
            $statusCode = is_numeric($e->getCode()) ? (int) $e->getCode() : 500;
            return response()->json(['error' => $e->getMessage()], $statusCode);
        }
    }

    public function removeCourse($nim, $schedule_id)
    {
        try {
            $this->krsService->removeCourse($nim, $schedule_id, request());
            return response()->json(['message' => 'Course removed successfully'], 200);
        } catch (\Exception $e) {
            // Konversi kode status ke integer
            $statusCode = is_numeric($e->getCode()) ? (int) $e->getCode() : 500;
            return response()->json(['error' => $e->getMessage()], $statusCode);
        }
    }

    public function krsStatus($nim)
    {
        try {
            $status = $this->krsService->getKrsStatus($nim);
            return new KrsStatusResource($status);
        } catch (\Exception $e) {
            // Konversi kode status ke integer
            $statusCode = is_numeric($e->getCode()) ? (int) $e->getCode() : 500;
            return response()->json(['error' => $e->getMessage()], $statusCode);
        }
    }
}